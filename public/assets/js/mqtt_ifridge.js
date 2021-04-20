let connected_flag = 0;
let mqtt;
const reconnectTimeout = 2000;
let host = "192.168.1.157";
let port = 9001;
let row = 0;
let out_msg = "";
let mcount = 0;

function onConnectionLost() {
    console.log("connection lost");
    document.getElementById("status").innerHTML = "Connection Lost";
    document.getElementById("status_messages").innerHTML = "Connection Lost";
    connected_flag = 0;
}

function onFailure(message) {
    console.log("Failed");
    document.getElementById("status_messages").innerHTML = "Connection Failed- Retrying";
    setTimeout(MQTTconnect, reconnectTimeout);
}

function onMessageArrived(r_message) {
    out_msg = "Message received " + r_message.payloadString;
    out_msg = out_msg + "      Topic " + r_message.destinationName + "<br/>";
    out_msg = "<b>" + out_msg + "</b>";
    //console.log(out_msg+row);
    try {
        document.getElementById("out_messages").innerHTML += out_msg;
    } catch (err) {
        document.getElementById("out_messages").innerHTML = err.message;
    }

    if (row === 10) {
        row = 1;
        document.getElementById("out_messages").innerHTML = out_msg;
    } else
        row += 1;

    mcount += 1;
    console.log(mcount + "  " + row);
}

function onConnected(recon, url) {
    console.log(" in onConnected " + reconn);
}

function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    document.getElementById("status_messages").innerHTML = "Connected to " + host + "on port " + port;
    connected_flag = 1;
    document.getElementById("status").innerHTML = "Connected";
    console.log("on Connect " + connected_flag);

}

function disconnect() {
    if (connected_flag === 1)
        mqtt.disconnect();
}

function MQTTconnect() {
    let clean_sessions = document.forms["connform"]["clean_sessions"].value;
    const user_name = document.forms["connform"]["username"].value;
    console.log("clean= " + clean_sessions);
    const password = document.forms["connform"]["password"].value;

    clean_sessions = clean_sessions === document.forms["connform"]["clean_sessions"].checked;

    document.getElementById("status_messages").innerHTML = "";
    const s = document.forms["connform"]["server"].value;
    const p = document.forms["connform"]["port"].value;
    if (p !== "") {
        port = parseInt(p);
    }
    if (s !== "") {
        host = s;
        console.log("host");
    }

    console.log("connecting to " + host + " " + port + "clean session=" + clean_sessions);
    console.log("user " + user_name);
    document.getElementById("status_messages").innerHTML = 'connecting';
    const x = Math.floor(Math.random() * 10000);
    const cname = "orderform-" + x;
    mqtt = new Paho.MQTT.Client(host, port, cname);

    // document.write("connecting to "+ host);
    const options = {
        useSSL: true, // Importante
        timeout: 3,
        cleanSession: clean_sessions,
        onSuccess: onConnect,
        onFailure: onFailure,
    };
    if (user_name !== "")
        options.userName = document.forms["connform"]["username"].value;
    if (password !== "")
        options.password = document.forms["connform"]["password"].value;

    mqtt.onConnectionLost = onConnectionLost;
    mqtt.onMessageArrived = onMessageArrived;
    mqtt.onConnected = onConnected;

    mqtt.connect(options);
    return false;


}

function sub_topics() {
    document.getElementById("status_messages").innerHTML = "";
    if (connected_flag === 0) {
        out_msg = `<b>Not Connected so can't subscribe</b>`;
        console.log(out_msg);
        document.getElementById("status_messages").innerHTML = out_msg;
        return false;
    }
    const stopic = document.forms["subs"]["Stopic"].value;
    console.log("here");
    let sqos = parseInt(document.forms["subs"]["sqos"].value);
    if (sqos > 2)
        sqos = 0;
    console.log("Subscribing to topic =" + stopic + " QOS " + sqos);
    document.getElementById("status_messages").innerHTML = "Subscribing to topic =" + stopic;
    const soptions = {
        qos: sqos,
    };
    mqtt.subscribe(stopic, soptions);
    return false;
}

function send_message() {
    console.log("hello")
    document.getElementById("status_messages").innerHTML = "";
    if (connected_flag === 0) {
        out_msg = "<b>Not Connected so can't send</b>"
        console.log(out_msg);
        document.getElementById("status_messages").innerHTML = out_msg;
        return false;
    }
    let pqos = parseInt(document.forms["smessage"]["pqos"].value);
    if (pqos > 2)
        pqos = 0;
    const msg = document.forms["smessage"]["message"].value;
    console.log(msg);
    document.getElementById("status_messages").innerHTML = "Sending message  " + msg;

    const topic = document.forms["smessage"]["Ptopic"].value;
    //var retain_message = document.forms["smessage"]["retain"].value;
    let retain_flag = !!document.forms["smessage"]["retain"].checked;

    let message = new Paho.MQTT.Message(msg);
    if (topic === "")
        message.destinationName = "test-topic";
    else
        message.destinationName = topic;
    message.qos = pqos;
    message.retained = retain_flag;
    mqtt.send(message);
    return false;
}

