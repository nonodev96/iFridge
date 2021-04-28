var mqtt = require("mqtt");
var client = mqtt.connect("wss://localhost:8884");

client.on("connect", function () {
  console.log("hi");
  client.subscribe("presence", function (err) {
    console.log("hi2");
    if (!err) {
      client.publish("presence", "Hello mqtt");
    }
  });
});

client.on("message", function (topic, message) {
  // message is Buffer
  console.log(message.toString());
  client.end();
});
