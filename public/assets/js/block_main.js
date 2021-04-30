document.addEventListener('DOMContentLoaded', function () {
    const toolbox =
        `
<xml id="toolbox" style="display: none">
    <category id="catMqtt" colour="red" name="MQTT-UJAEN">
          <block type="mqtt_send"></block>
    </category>
    <sep></sep>
    <category id="catLogic" colour="210" name="Logic">
      <block type="controls_if"></block>
      <block type="logic_compare"></block>
      <block type="logic_operation"></block>
      <block type="logic_negate"></block>
      <block type="logic_boolean"></block>
      <block type="logic_null"></block>
      <block type="logic_ternary"></block>
    </category>
    <category id="catLoops" colour="120" name="Loops">
      <block type="controls_repeat_ext">
        <value name="TIMES">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="controls_whileUntil"></block>
      <block type="controls_for">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
        <value name="BY">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="controls_forEach"></block>
      <block type="controls_flow_statements"></block>
    </category>
    <category id="catMath" colour="230" name="Math">
      <block type="math_number"></block>
      <block type="math_arithmetic">
        <value name="A">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="B">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="math_single">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">9</field>
          </shadow>
        </value>
      </block>
      <block type="math_trig">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">45</field>
          </shadow>
        </value>
      </block>
      <block type="math_constant"></block>
      <block type="math_number_property">
        <value name="NUMBER_TO_CHECK">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="math_change">
        <value name="DELTA">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="math_round">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">3.1</field>
          </shadow>
        </value>
      </block>
      <block type="math_on_list"></block>
      <block type="math_modulo">
        <value name="DIVIDEND">
          <shadow type="math_number">
            <field name="NUM">64</field>
          </shadow>
        </value>
        <value name="DIVISOR">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="math_constrain">
        <value name="VALUE">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="LOW">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="HIGH">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_int">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_float"></block>
    </category>
    <category id="catText" colour="160" name="Text">
      <block type="text"></block>
      <block type="text_join"></block>
      <block type="text_append">
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <block type="text_length">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_isEmpty">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT"></field>
          </shadow>
        </value>
      </block>
      <block type="text_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
        <value name="FIND">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_charAt">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
      </block>
      <block type="text_getSubstring">
        <value name="STRING">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
      </block>
      <block type="text_changeCase">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_trim">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_print">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_prompt_ext">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
    </category>
    <category id="catLists" colour="260" name="Lists">
      <block type="lists_create_with">
        <mutation items="0"></mutation>
      </block>
      <block type="lists_create_with"></block>
      <block type="lists_repeat">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">5</field>
          </shadow>
        </value>
      </block>
      <block type="lists_length"></block>
      <block type="lists_isEmpty"></block>
      <block type="lists_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_getIndex">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_setIndex">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_getSublist">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_split">
        <value name="DELIM">
          <shadow type="text">
            <field name="TEXT">,</field>
          </shadow>
        </value>
      </block>
      <block type="lists_sort"></block>
    </category>
    <category id="catColour" colour="20" name="Color">
      <block type="colour_picker"></block>
      <block type="colour_random"></block>
      <block type="colour_rgb">
        <value name="RED">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
        <value name="GREEN">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="BLUE">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="colour_blend">
        <value name="COLOUR1">
          <shadow type="colour_picker">
            <field name="COLOUR">#ff0000</field>
          </shadow>
        </value>
        <value name="COLOUR2">
          <shadow type="colour_picker">
            <field name="COLOUR">#3333ff</field>
          </shadow>
        </value>
        <value name="RATIO">
          <shadow type="math_number">
            <field name="NUM">0.5</field>
          </shadow>
        </value>
      </block>
    </category>
    <sep></sep>
    <category id="catVariables" colour="330" custom="VARIABLE" name="Variables"></category>
    <category id="catFunctions" colour="290" custom="PROCEDURE" name="Functions"></category>
  </xml>
    `;
// https://developers.google.com/blockly/guides/create-custom-blocks/define-blocks
    Blockly.Blocks['mqtt_send'] = {
        init: function () {
            this.jsonInit({
                "message0": "MQTT SEND Broker %1:%2 topic: %3 msg: %4",
                "args0": [
                    {"type": "field_variable", "name": "broker_host_VAR", "variable": "Host", "variableTypes": [""]},
                    {"type": "field_variable", "name": "broker_port_VAR", "variable": "Port", "variableTypes": [""]},
                    {"type": "field_variable", "name": "Topic_TEXT", "variable": "Topic", "variableTypes": [""]},
                    {"type": "field_variable", "name": "Message_TEXT", "variable": "Message", "variableTypes": [""]},
                ],
                "previousStatement": null,
                "nextStatement": null,
                "colour": 230,
                "tooltip": 'Envia una peticion mqtt a la url X con puerto Y',
                "helpUrl": 'http://www.w3schools.com/jsref/jsref_length_string.asp'
            });
        }
    };

    Blockly.JavaScript['mqtt_send'] = function (block) {
        return 'mqtt_send(Host, Port, Topic, Message);\n';
    };

    function myUpdateFunction(event) {
        const languageDropdown = document.getElementById('languageDropdown');
        const languageSelection = languageDropdown.options[languageDropdown.selectedIndex].value;
        const codeDiv = document.getElementById('codeDiv');
        const codeHolder = document.createElement('pre');
        codeHolder.className = 'prettyprint but-not-that-pretty';
        const code = document.createTextNode(Blockly[languageSelection].workspaceToCode(workspace));
        codeHolder.appendChild(code);
        codeDiv.replaceChild(codeHolder, codeDiv.lastElementChild);
        //prettyPrint();
    }


    const workspace = Blockly.inject('blocklyDiv', {
        toolbox: toolbox,
        scrollbars: false
    });

    workspace.addChangeListener(myUpdateFunction);

    function mqtt_send(Host, Port, Topic, Message) {
        MQTTconnect(Host, Port);
        console.log(Host, Port, Topic, Message);
    }

    function executeBlockCode() {
        const code = Blockly.JavaScript.workspaceToCode(workspace);
        const initFunc = function (interpreter, scope) {

            const mqttWrapper = function (Host, Port, Topic, Message) {
                return interpreter.createPrimitive(mqtt_send(Host, Port, Topic, Message));
            };
            interpreter.setProperty(scope, 'mqtt_send',
                interpreter.createNativeFunction(mqttWrapper));

            const alertWrapper = function (text) {
                text = text ? text.toString() : '';
                return interpreter.createPrimitive(alert(text));
            };
            interpreter.setProperty(scope, 'alert',
                interpreter.createNativeFunction(alertWrapper));

            const promptWrapper = function (text) {
                text = text ? text.toString() : '';
                return interpreter.createPrimitive(prompt(text));
            };
            interpreter.setProperty(scope, 'prompt',
                interpreter.createNativeFunction(promptWrapper));
        };
        const myInterpreter = new Interpreter(code, initFunc);
        let stepsAllowed = 10000;
        while (myInterpreter.step() && stepsAllowed) {
            stepsAllowed--;
        }
        if (!stepsAllowed) {
            throw EvalError('Infinite loop.');
        }
    }

    function getXmlString(xml) {
        if (window.ActiveXObject) {
            return xml.xml;
        }
        return new XMLSerializer().serializeToString(xml);
    }

    function handleSave(event) {
        const xml_workspace = Blockly.Xml.workspaceToDom(Blockly.getMainWorkspace());
        const json_workspace = xmlToJson(getXmlString(xml_workspace));
        localStorage.setItem('blockly', json_workspace);
    }

    document.getElementById('playButton').addEventListener('click', executeBlockCode);
    document.getElementById('saveButton').addEventListener('click', handleSave);

    if (localStorage.getItem('blockly') != null) {
        const json_workspace = localStorage.getItem('blockly');
        const xml_workspace = jsonToXml(json_workspace);

        // Clear
        let workspace = Blockly.getMainWorkspace();
        workspace.clear();

        const xml = Blockly.Xml.textToDom(xml_workspace);
        Blockly.Xml.domToWorkspace(xml, workspace);
    }

    /*
     *  ========================================================================
     */

    let connected_flag = 0;
    let mqtt;
    const reconnectTimeout = 2000;

    function onConnectionLost() {
        console.log("connection lost");
        connected_flag = 0;
    }

    function onFailure(message) {
        console.log("Failed");
        setTimeout(MQTTconnect, reconnectTimeout);
    }

    function onMessageArrived(r_message) {
        console.log(r_message.payloadString);
        console.log(r_message.destinationName);
    }

    function onConnected(recon, url) {
        console.log(" in onConnected ", recon, url);
    }

    function onConnect() {
        // Once a connection has been made, make a subscription and send a message.
        connected_flag = 1;
        console.log("on Connect " + connected_flag);
        send_message("/hello/world", "Me quiero morir");
    }

    function disconnect() {
        if (connected_flag === 1)
            mqtt.disconnect();
    }

    function MQTTconnect(host, port) {
        const x = Math.floor(Math.random() * 10000);
        const cname = "orderform-" + x;

        mqtt = new Paho.MQTT.Client(host, parseInt(port), cname);

        // document.write("connecting to "+ host);

        mqtt.onConnectionLost = onConnectionLost;
        mqtt.onMessageArrived = onMessageArrived;
        mqtt.onConnected = onConnected;

        mqtt.connect({
            useSSL: true, // Importante
            timeout: 3,
            cleanSession: true,
            onSuccess: onConnect,
            onFailure: onFailure,
        });
        return false;
    }

    function sub_topics(topic) {
        if (connected_flag === 0) {
            return false;
        }

        console.log("Subscribing to topic =" + topic + " QOS " + 0);
        const sub_options = {
            qos: 0,
        };
        mqtt.subscribe(topic, sub_options);
        return false;
    }

    function send_message(topic, msg) {
        console.log('hi')
        if (connected_flag === 0) {
            return false;
        }
        let message = new Paho.MQTT.Message(msg);
        if (topic === "")
            message.destinationName = "test-topic";
        else
            message.destinationName = topic;
        message.qos = 0;
        message.retained = true;
        mqtt.send(message);
        return false;
    }

});