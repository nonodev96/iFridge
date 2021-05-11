/*
   @author nonodev96
*/

// MQTT
#include <ESP8266WiFi.h>
#include <PubSubClient.h>

// DHT11
#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <DHT_U.h>

// https://github.com/adafruit/Adafruit_Sensor
/**
   typedef struct
  {
    int32_t version;
    int32_t sensor_id;
    int32_t type;
    int32_t reserved0;
    int32_t timestamp;
    union
    {
        float           data[4];
        sensors_vec_t   acceleration;
        sensors_vec_t   magnetic;
        sensors_vec_t   orientation;
        sensors_vec_t   gyro;
        float           temperature;
        float           distance;
        float           light;
        float           pressure;
        float           relative_humidity;
        float           current;
        float           voltage;
        sensors_color_t color;
    };
  } sensors_event_t;
*/


// Definición DHT11
#define DHTTYPE DHT11
#define DHTPIN D4

DHT_Unified dht(DHTPIN, DHTTYPE);
uint32_t delayMS;

// Definición Sensor Proximidad
#define echoPin D7
#define trigPin D6


// Definición MQTT SERVER
#define MQTT_SERVER_PORT 1883
const char* ssid = "MiFibra-5B22";
const char* password = "nM25e3vM";
const char* mqtt_server = "broker.emqx.io";


// Definición wifi
WiFiClient espClient;
PubSubClient client(espClient);
unsigned long lastMsg = 0;

// Definción mensaje que enviamos
#define MSG_BUFFER_SIZE	(50)
char msg[MSG_BUFFER_SIZE];

// Variables de los mensajes que enviamos
float valueTemperature = 0;
float valueHumidity = 0;
float valueDistance = 0;


/**
   Para conectarse a la red wifi
*/
void setup_wifi() {
  delay(10);
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  randomSeed(micros());

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

/**
   Función de callback que trata la respuesta de los topìcs
*/
void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  for (int i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
  }
  Serial.println();
  // ===============
  String string_topic = String(topic);

  if (string_topic.equals("/hello/world")) {
    for (int i = 0; i < length; i++) {
      Serial.print((char)payload[i]);
    }
  }

}

void reconnect() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");

    String clientId = "ESP8266Client-";
    clientId += String(random(0xffff), HEX);

    if (client.connect(clientId.c_str())) {
      Serial.println("connected");

      client.publish("outTopic", "hello world");

      client.subscribe("/hello/world");

    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(5000);
    }
  }
}

void setup_dht() {
  dht.begin();
  sensor_t sensor;

  dht.temperature().getSensor(&sensor);
  Serial.println(F("------------------------------------"));
  Serial.println(F("Temperature Sensor"));
  Serial.print  (F("Sensor Type: ")); Serial.println(sensor.name);
  Serial.print  (F("Driver Ver:  ")); Serial.println(sensor.version);
  Serial.print  (F("Unique ID:   ")); Serial.println(sensor.sensor_id);
  Serial.print  (F("Max Value:   ")); Serial.print(sensor.max_value); Serial.println(F("°C"));
  Serial.print  (F("Min Value:   ")); Serial.print(sensor.min_value); Serial.println(F("°C"));
  Serial.print  (F("Resolution:  ")); Serial.print(sensor.resolution); Serial.println(F("°C"));
  Serial.println(F("------------------------------------"));

  dht.humidity().getSensor(&sensor);
  Serial.println(F("Humidity Sensor"));
  Serial.print  (F("Sensor Type: ")); Serial.println(sensor.name);
  Serial.print  (F("Driver Ver:  ")); Serial.println(sensor.version);
  Serial.print  (F("Unique ID:   ")); Serial.println(sensor.sensor_id);
  Serial.print  (F("Max Value:   ")); Serial.print(sensor.max_value); Serial.println(F("%"));
  Serial.print  (F("Min Value:   ")); Serial.print(sensor.min_value); Serial.println(F("%"));
  Serial.print  (F("Resolution:  ")); Serial.print(sensor.resolution); Serial.println(F("%"));
  Serial.println(F("------------------------------------"));
  delayMS = sensor.min_delay / 1000;
}

void setup_HC_SR04() {
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
}

/**
   Setup
*/
void setup() {
  Serial.begin(9600);
  //  pinMode(BUILTIN_LED, OUTPUT);

  setup_wifi();

  setup_dht();
  setup_HC_SR04();

  client.setServer(mqtt_server, MQTT_SERVER_PORT);
  client.setCallback(callback);
}

long getDistance() {
  long duration, distance;

  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH);

  // Calculado en función de la velocidad del sonido.
  distance = duration * 0.034 / 2;
  return distance;
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();

  // Espera a que el sensor tome una medida
  delay(delayMS * 5);

  sensors_event_t event;
  dht.temperature().getEvent(&event);

  valueTemperature = event.temperature;
  valueHumidity = event.relative_humidity;
  valueDistance = float( getDistance() );



  if ( !isnan(valueTemperature) ) {
    Serial.println("Publish message: Temperature");
    Serial.print(F("Temperature: "));
    Serial.print(valueTemperature);
    Serial.println(F("°C"));

    snprintf (msg, MSG_BUFFER_SIZE, "{'temperature': '%.2f'}", valueTemperature);
    client.publish("/hello/ujaen_temperature", msg);
  }

  if ( !isnan(valueHumidity) ) {
    Serial.println("Publish message: Humidity");
    Serial.print(F("Humidity: "));
    Serial.print(valueHumidity);
    Serial.println(F("%"));

    snprintf (msg, MSG_BUFFER_SIZE, "{'humidity': '%.2f'}", valueHumidity);
    client.publish("/hello/ujaen_humidity", msg);
  }

  if ( !isnan(valueDistance) && valueDistance != 0.0 ) {
    Serial.println("Publish message: Distance");
    Serial.print(F("Distance: "));
    Serial.print(valueDistance);
    Serial.println(F("cm"));

    snprintf (msg, MSG_BUFFER_SIZE, "{'distance': '%.2f'}", valueDistance);
    client.publish("/hello/ujaen_distance", msg);
  }

}
