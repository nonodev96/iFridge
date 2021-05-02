<?php $this->section('page_title') ?>Admin<?php $this->endSection() ?>

<?php $this->section('css') ?>

<?php $this->endSection() ?>

<?php $this->section('content') ?>
    <template id="template_house">
        <link rel="stylesheet" href="/assets/css/house.css">
        <div class="house" id="house" data-rooms="6">
            <div class="house-wings" data-flip-key="wings">
                <div class="house-left-wing">
                    <div class="house-window"></div>
                    <div class="house-window"></div>
                    <div class="house-sparkle">
                        <div class="house-sparkle-dots"></div>
                    </div>
                </div>
                <div class="house-right-wing">
                    <div class="house-window"></div>
                    <div class="house-window"></div>
                    <div class="house-sparkle">
                        <div class="house-sparkle-dots"></div>
                    </div>
                </div>
                <div class="house-roof">
                    <div class="house-ledge"></div>
                </div>
            </div>
            <div class="house-front" data-flip-key="front">
                <div class="house-chimney"></div>
                <div class="house-facade"></div>
                <div class="house-window">
                    <div class="house-sparkle">
                        <div class="house-sparkle-dots"></div>
                    </div>
                </div>
                <div class="house-doorway">
                    <div class="house-stairs"></div>
                    <div class="house-door"></div>
                </div>
                <div class="house-gable">
                    <div class="house-roof">
                        <div class="house-ledge"></div>
                    </div>
                </div>
            </div>
        </div>

        <label class="house-label" for="range" id="label">Rooms</label>
        <input type="range" min="3" max="6" step="1" value="6" id="range">
    </template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3>Code</h3>
                <hr>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>

            <div class="col-md-7">
                <div id="blocklyDiv" style="height: 500px;"></div>
            </div>
            <div class="col-md-3">
                <div id="saveButton" class="btn btn-block btn-outline-primary">Save</div>
                <div id="playButton" class="btn btn-block btn-outline-success">Play</div>
                <div id="codeDiv" class="main output-panel">
                    <div class="form-group" hidden>
                        <label for="languageDropdown">Language:</label>
                        <select id="languageDropdown" class="form-control" onChange="myUpdateFunction();">
                            <option value="JavaScript">JavaScript</option>
                        </select>
                    </div>
                    <hr class="POps">
                    <pre translate="no" dir="ltr"></pre>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>House</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <custom-house></custom-house>
                </div>
            </div>
            <div class="col-md-6">
                <p>Sensor {{mqtt[$host][$port][$topic_1]}}</p>
                <p>Sensor {{mqtt[$host][$port][$topic_2]}}</p>
                <p>Sensor {{mqtt[$host][$port][$topic_3]}}</p>
                <p>Sensor {{mqtt[$host][$port][$topic_4]}}</p>
                <p>Sensor {{mqtt[$host][$port][$topic_5]}}</p>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>

<?php $this->section('scripts') ?>
    <script>
        class House extends HTMLElement {

            constructor() {
                super();
                this.template = document.getElementById('template_house');
                this.templateContent = this.template.content;

                this.attachShadow({mode: 'open'})
                    .appendChild(this.templateContent.cloneNode(true));
                this.init();
            }

            init() {
                const house = this.shadowRoot.getElementById('house');
                const range = this.shadowRoot.getElementById('range');
                const label = this.shadowRoot.getElementById('label');
                range.addEventListener('click', () => {
                    const rooms = range.value;
                    const prevRooms = house.getAttribute('data-rooms');
                    house.setAttribute('data-prev-rooms', prevRooms);
                    house.setAttribute('data-rooms', rooms);
                })
            }

            connectedCallback() {

            }

            disconnectedCallback() {

            }
        }

        window.customElements.define('custom-house', House);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>

    <script src="/assets/plugins/xmltojson.js"></script>
    <script src="https://unpkg.com/blockly/blockly.min.js"></script>
    <script src="/assets/plugins/blockly/javascript_compressed.js"></script>
<!--    <script src="/assets/plugins/JS-Interpreter/acorn_interpreter.js"></script>-->
    <script src="/assets/plugins/JS-Interpreter/acorn.js"></script>
    <script src="/assets/plugins/JS-Interpreter/interpreter.js"></script>
<!--    <script src="/assets/plugins/mqtt-blockly/blocks_mqtt.js" type="module"></script>-->
<!--    <script src="/assets/plugins/mqtt-blockly/generators_mqtt.js" type="module"></script>-->
    <script src="/assets/js/block_main.js"></script>
    <script src="/assets/js/mqtt-house.js"></script>

<?php $this->endSection() ?>