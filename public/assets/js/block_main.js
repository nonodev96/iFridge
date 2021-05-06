document.addEventListener('DOMContentLoaded', function () {
    const toolbox =
        `
<xml id="toolbox" style="display: none">
    <category id="catMqtt" colour="red" name="MQTT-UJAEN">
          <block type="mqtt_send_async"></block>
          <block type="mqtt_send"></block>
          <block type="mqtt_subs"></block>
          <block type="wait_a_minute"></block>
          <block type="wait_time"></block>
<!--        <block type="mqtt_block"></block>-->
<!--        <block type="mqtt_connect_block"></block>-->
<!--        <block type="mqtt_publish_block"></block>-->
<!--        <block type="mqtt_subscribe_block"></block>-->
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

    /**
     * https://developers.google.com/blockly/guides/create-custom-blocks/define-blocks
     */
    let workspace;

    function defineBlocks() {
        Blockly.Blocks['wait_a_minute'] = {
            init: function () {
                this.jsonInit({
                    "type": "wait_a_minute",
                    "message0": "wait_a_minute",
                    "args0": [
                        // {
                        //     "type": "field_input",
                        //     "name": "send_HOST",
                        //     "text": "host"
                        // }
                    ],
                    "output": "Boolean",
                    "colour": 230,
                    "tooltip": "",
                    "helpUrl": ""
                });
            }
        };

        Blockly.Blocks['wait_time'] = {
            init: function () {
                this.jsonInit({
                    "type": "wait_time",
                    "message0": "wait_time %1 ms",
                    "args0": [
                        {
                            "type": "field_input",
                            "name": "TIME",
                            "text": "time"
                        }
                    ],
                    "output": "Boolean",
                    "colour": 230,
                    "tooltip": "",
                    "helpUrl": ""
                });
            }
        };

        Blockly.Blocks['mqtt_send_async'] = {
            init: function () {
                this.jsonInit({
                    "type": "mqtt_send_async",
                    "message0": "mqtt_send async - await %1 %2 %3 %4",
                    "args0": [
                        {
                            "type": "field_input",
                            "name": "HOST",
                            "text": "host"
                        },
                        {
                            "type": "field_input",
                            "name": "PORT",
                            "text": "port"
                        },
                        {
                            "type": "field_input",
                            "name": "TOPIC",
                            "text": "topic"
                        },
                        {
                            "type": "field_input",
                            "name": "MESSAGE",
                            "text": "message"
                        },
                        // {
                        //     "type": "input_value",
                        //     "name": "NAME"
                        // }
                    ],
                    "output": "Boolean",
                    "colour": 230,
                    "tooltip": "",
                    "helpUrl": ""
                });
            }
        }

        Blockly.Blocks['mqtt_send'] = {
            init: function () {
                this.jsonInit({
                    "type": "mqtt_send",
                    "message0": "MQTT SEND delay %1:%2 topic: %3 msg: %4",
                    "args0": [
                        {
                            "type": "field_variable",
                            "name": "mqtt_send_host",
                            "variable": "send_Host",
                            "variableTypes": [""]
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_send_port",
                            "variable": "send_Port",
                            "variableTypes": [""]
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_send_topic",
                            "variable": "send_Topic",
                            "variableTypes": [""]
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_send_message",
                            "variable": "send_Message",
                            "variableTypes": [""]
                        },

                        // {
                        //     "type": "input_statement",
                        //     "name": "resolve"
                        // },
                        // {
                        //     "type": "input_statement",
                        //     "name": "reject"
                        // }


                    ],
                    "previousStatement": null,
                    "nextStatement": null,
                    "colour": 230,
                    "tooltip": 'Envia una peticion MQTT',
                    "helpUrl": ''
                });
            }
        };

        Blockly.Blocks['mqtt_subs'] = {
            init: function () {
                this.jsonInit({
                    "type": "mqtt_subs",
                    "message0": "mqtt_sub %1 %2 %3 %4",
                    "args0": [
                        {
                            "type": "field_variable",
                            "name": "mqtt_subs_HOST",
                            "variable": "host"
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_subs_PORT",
                            "variable": "port"
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_subs_TOPIC",
                            "variable": "topic"
                        },
                        {
                            "type": "field_variable",
                            "name": "mqtt_subs_SENSOR",
                            "variable": "sensor",
                        },
                    ],
                    "previousStatement": null,
                    "nextStatement": null,
                    "colour": 230,
                    "tooltip": "",
                    "helpUrl": ""
                });
            }
        };

        /**
         *
         */
        Blockly.JavaScript['wait_a_minute'] = function (block) {
            return [`wait_a_minute()`, Blockly.JavaScript.ORDER_NONE];
        }

        Blockly.JavaScript['wait_time'] = function (block) {
            const text_time = block.getField('TIME').getText();
            return [`wait_time('${text_time}')`, Blockly.JavaScript.ORDER_NONE];
        }

        Blockly.JavaScript['mqtt_send'] = function (block) {
            const text_host = block.getField('mqtt_send_host').getText();
            const text_port = block.getField('mqtt_send_port').getText();
            const text_topic = block.getField('mqtt_send_topic').getText();
            const text_message = block.getField('mqtt_send_message').getText();

            // const statements_resolve = Blockly.JavaScript.statementToCode(block, 'resolve');
            // const statements_reject = Blockly.JavaScript.statementToCode(block, 'reject');

            return `mqtt_send(${text_host}, ${text_port}, ${text_topic}, ${text_message});\n`;
        };

        Blockly.JavaScript['mqtt_send_async'] = function (block) {
            const text_host = block.getFieldValue('HOST');
            const text_port = block.getFieldValue('PORT');
            const text_topic = block.getFieldValue('TOPIC');
            const text_message = block.getFieldValue('MESSAGE');
            // const value_name = Blockly.JavaScript.valueToCode(block, 'NAME', Blockly.JavaScript.ORDER_ATOMIC);

            const code = `mqtt_send_async('${text_host}', ${text_port}, '${text_topic}', '${text_message}')`;
            return [code, Blockly.JavaScript.ORDER_NONE];
        };

        Blockly.JavaScript['mqtt_subs'] = function (block) {
            const text_host = block.getField('mqtt_subs_HOST').getText();
            const text_port = block.getField('mqtt_subs_PORT').getText();
            const text_topic = block.getField('mqtt_subs_TOPIC').getText();
            const var_sensor = block.getField('mqtt_subs_SENSOR').getText();

            // const statements_resolve = Blockly.JavaScript.statementToCode(block, 'resolve');
            // const statements_reject = Blockly.JavaScript.statementToCode(block, 'reject');

            const code = `mqtt_subs(${text_host}, ${text_port}, ${text_topic}, ${var_sensor});\n`;
            return code;
        };
    }


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

    function asyncFunctions(interpreter, scope) {
        Blockly.JavaScript.addReservedWords('mqtt_send');
        Blockly.JavaScript.addReservedWords('mqtt_send_async');
        Blockly.JavaScript.addReservedWords('wait_a_minute');
        Blockly.JavaScript.addReservedWords('wait_time');
        Blockly.JavaScript.addReservedWords('mqtt_subs');

        function wait(ms) {
            return new Promise(r => setTimeout(r, ms));
        }

        function mqtt_send_(Host, Port, Topic, Message) {
            return new Promise((resolve) => {
                let mqtt_controller = new MQTT_Controller();

                mqtt_controller
                    .MQTT_Connect(Host, Port).then((result, reject) => {

                    if (result === true) {
                        mqtt_controller.send_message(Topic, Message).then((result_, reject_) => {
                            if (result_ === true) {

                                resolve(true);

                            } else {
                                resolve(false);
                                reject_(new Error("No se ha podido enviar el mensaje"));
                            }
                        });
                    } else {
                        resolve(false);
                        reject(new Error("No se ha podido conectar"));
                    }
                });
            });
        }

        /**
         *
         * @param callback
         * @returns {Promise<void>}
         */
        const waitWrapper = async function (callback) {
            await wait(60000);
            callback(true);
        }
        interpreter.setProperty(scope, 'wait_a_minute',
            interpreter.createAsyncFunction(waitWrapper));

        /**
         *
         * @param time
         * @param callback
         * @returns {Promise<void>}
         */
        const wait_time_Wrapper = async function (time, callback) {
            await wait(time);
            callback(true);
        }
        interpreter.setProperty(scope, 'wait_time',
            interpreter.createAsyncFunction(wait_time_Wrapper));

        /**
         *
         * @param Host
         * @param Port
         * @param Topic
         * @param Message
         * @param callback
         * @returns {Promise<void>}
         */
        const mqtt_send_async_Wrapper = async function (Host, Port, Topic, Message, callback) {
            const result = await mqtt_send_(Host, Port, Topic, Message);
            callback(result);
        }
        interpreter.setProperty(scope, 'mqtt_send_async',
            interpreter.createAsyncFunction(mqtt_send_async_Wrapper));

        /**
         *
         * @param Host
         * @param Port
         * @param Topic
         * @param Message
         * @param callback
         * @returns {Promise<void>}
         */
        const mqttWrapper = async function (Host, Port, Topic, Message, callback) {
            // await new Promise((resolve, reject) => setTimeout(resolve, 1));
            //
            mqtt_send(Host, Port, Topic, Message)
                .then((ok, re) => {

                    // callback(ok)
                    setTimeout(callback, 1000);
                });
        };
        interpreter.setProperty(scope, 'mqtt_send',
            interpreter.createAsyncFunction(mqttWrapper));

        const mqtt_subs_Wrapper = async function (Host, Port, Topic, Sensor, callback) {

            const resolve_subs = await mqtt_subs(Host, Port, Topic)
            map.set(Topic, Sensor);
            document.addEventListener('message', (event) => {
                let message = event.detail;
                if (map.has(message.topic)) {
                    document.getElementById(map.get(message.topic)).innerText = JSON.stringify(message);
                }
            });

            callback(resolve_subs);
        };
        interpreter.setProperty(scope, 'mqtt_subs',
            interpreter.createAsyncFunction(mqtt_subs_Wrapper));

    }

    let map = new Map();
    let cont = 0;
    let myInterpreter = null;
    let runner;

    function executeBlockCode() {
        const code = Blockly.JavaScript.workspaceToCode(workspace);
        // let code = Blockly['JavaScript'].workspaceToCode(workspace).replace(/(?<=^|\n)function \w+\(.*\)/g, 'async $&');
        const initFunc = function (interpreter, scope) {

            asyncFunctions(interpreter, scope);

            const alertWrapper = function (text) {
                text = text ? text.toString() : '';
                alert(text);
            };
            interpreter.setProperty(scope, 'alert',
                interpreter.createNativeFunction(alertWrapper));

            const promptWrapper = function (text) {
                text = text ? text.toString() : '';
                return prompt(text);
                // return interpreter.createPrimitive();
            };
            interpreter.setProperty(scope, 'prompt',
                interpreter.createNativeFunction(promptWrapper));
        };

        if (!myInterpreter) {
            setTimeout(function () {
                myInterpreter = new Interpreter(code, initFunc);
                runner = function () {
                    if (myInterpreter) {
                        let hasMore = myInterpreter.run();
                        if (hasMore) {
                            // Execution is currently blocked by some async call.
                            // Try again later.
                            setTimeout(runner, 10);
                        } else {
                            // Program is complete.
                            resetInterpreter();
                        }
                    }
                };
                runner();
            }, 1);
        }

        // let stepsAllowed = 10000;
        // while (myInterpreter.step() && stepsAllowed) {
        //     stepsAllowed--;
        // }
        // if (!stepsAllowed) {
        //     throw EvalError('Infinite loop.');
        // }
    }

    function resetInterpreter() {
        myInterpreter = null;
        if (runner) {
            clearTimeout(runner);
            runner = null;
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

    function initBlockly() {

        workspace = Blockly.inject('blocklyDiv', {
            toolbox: toolbox,
            scrollbars: false
        });

        workspace.addChangeListener(myUpdateFunction);

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
    }

    defineBlocks();
    initBlockly();


    /**
     * MQTT FUNCTIONS BLOCKLY
     * ========================================================================
     */
    function mqtt_subs(Host, Port, Topic) {
        return new Promise((resolve_subscribe, reject_subscribe) => {

            const mqtt_controller = new MQTT_Controller();
            mqtt_controller.MQTT_Connect(Host, Port)
                .then((resolve, reject) => {
                    if (resolve === true) {

                        mqtt_controller.sub_topics(Topic)
                            .then((resolve_topic_subscribe, reject_topic_subscribe) => {

                                resolve_subscribe(true);
                            });
                    }
                });
        });
    }

    function mqtt_send(Host, Port, Topic, Message) {
        return new Promise((resolve_send, reject_send) => {

            const mqtt_controller = new MQTT_Controller();
            mqtt_controller.MQTT_Connect(Host, Port)
                .then((resolve, reject) => {

                    if (resolve === true) {
                        mqtt_controller.send_message(Topic, Message)
                            .then((resolve_message, reject_message) => {

                                resolve_send(resolve_message);
                            });
                    }
                });


        });
    }

    /**
     * MQTT FUNCTIONS
     * ========================================================================
     */

    class MQTT_Controller {

        constructor() {
            this.mqtt = null;
            this.connected_flag = 0;
            this.reconnectTimeout = 2000;
        }


        MQTT_Connect(host, port) {
            return new Promise(((resolve, reject) => {
                const x = Math.floor(Math.random() * 10000);
                const cname = "orderform-" + x;

                this.mqtt = new Paho.MQTT.Client(host, parseInt(port), cname);

                // document.write("connecting to "+ host);

                this.mqtt.onConnectionLost = this.onConnectionLost;
                this.mqtt.onMessageArrived = this.onMessageArrived;
                this.mqtt.onConnected = this.onConnected;

                this.mqtt.connect({
                    useSSL: true, // Importante
                    timeout: 3,
                    cleanSession: true,
                    onSuccess: () => {
                        this.connected_flag = 1;
                        resolve(true);
                    },
                    onFailure: (message) => {
                        resolve(false);
                        reject(new Error("On Connection"));
                    },
                });

            }));
        }

        onConnectionLost() {
            this.connected_flag = 0;
        }

        onMessageArrived(r_message) {

            document.dispatchEvent(new CustomEvent("message", {
                detail: {
                    topic: r_message.destinationName,
                    message: r_message.payloadString,
                }
            }));
        }

        onConnected(recon, url) {
        }

        disconnect() {
            if (this.connected_flag === 1)
                this.mqtt.disconnect();
        }

        sub_topics(topic) {
            return new Promise((resolve, reject) => {
                if (this.connected_flag === 0) {
                    resolve(false);
                    return;
                }

                const sub_options = {
                    qos: 0,
                };
                this.mqtt.subscribe(topic, sub_options);
                resolve(true);
            });
        }


        send_message(topic, msg) {
            return new Promise((resolve, reject) => {
                if (this.connected_flag === 0) {
                    resolve(false);
                    return;
                }

                let message = new Paho.MQTT.Message(msg);
                if (topic === "")
                    message.destinationName = "test-topic";
                else
                    message.destinationName = topic;
                message.qos = 0;
                message.retained = true;

                this.mqtt.send(message);
                resolve(true);
            });
        }

    }
});