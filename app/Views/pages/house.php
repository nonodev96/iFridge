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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>House</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">
                    <custom-house></custom-house>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Sensors</h4>
                <hr>
                <div id="sensors">
                    <p>Temperature 1 <span data-sensors="/topic/nonodev96_1"></span></p>
                    <p>Temperature 2 <span data-sensors="/topic/nonodev96_2"></span></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div id="out_messages"></div>
            </div>
            <div class="col-md-4">
                <div id="status"></div>
            </div>
            <div class="col-md-4">
                <div id="status_messages"></div>
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
    <script src="/assets/js/mqtt-sensors.js"></script>
<?php $this->endSection() ?>