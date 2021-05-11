<?php $this->section('page_title') ?>MQTT<?php $this->endSection() ?>
<?php $this->section('css') ?>

<?php $this->endSection() ?>


<?php $this->section('content') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Websockets MQTT Monitor</h1>
                <p>https://www.emqx.io/mqtt/public-mqtt5-broker</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4" id="connect">
                <form name="connform" action="#" onsubmit="return MQTTconnect()">
                    <div class="form-group">
                        <label for="server_id">Server:</label>
                        <input type="text" class="form-control" name="server" id="server_id">
                    </div>

                    <div class="form-group">
                        <label for="port_id">Port: </label>
                        <input type="text" class="form-control" name="port" id="port_id">
                    </div>

                    <div class="form-check">
                        <input id="clean_sessions_id" class="form-check-input" type="checkbox" name="clean_sessions"
                               value="true" checked>
                        <label for="clean_sessions_id" class="form-check-label">Clean Session</label>
                    </div>

                    <div class="form-group">
                        <label for="username_id">Username:</label>
                        <input id="username_id" class="form-control" type="text" name="username" value="">
                    </div>

                    <div class="form-group">
                        <label for="password_id">Password:</label>
                        <input id="password_id" class="form-control" type="text" name="password" value="">
                    </div>

                    <input name="conn" type="submit" value="Connect" class="btn btn-primary">

                    <input type="button" name="discon " value="DisConnect" class="btn btn-primary"
                           onclick="disconnect()">
                </form>
            </div>
            <div class="col-lg-4" id="subscribe">
                <form name="subs" action="#" onsubmit="return sub_topics()">
                    <div class="form-group">
                        <label for="s_topic_id">Subscribe Topic:</label>
                        <input id="s_topic_id" type="text" name="Stopic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="s_qos_id">Subscribe QOS:</label>
                        <input id="s_qos_id" type="text" name="sqos" value="0" class="form-control">
                    </div>

                    <input type="submit" value="Subscribe" class="btn btn-secondary">
                </form>
            </div>

            <div class="col-lg-4" id="publish">
                <form name="smessage" action="#" onsubmit="return send_message()">
                    <div class="form-group">
                        <label for="p_topic_id">Publish Topic:</label>
                        <input id="p_topic_id" type="text" name="Ptopic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message_id">Message:</label>
                        <input id="message_id" type="text" name="message" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="publish_id">Publish QOS:</label>
                        <input id="publish_id" type="text" name="pqos" value="0" class="form-control">
                    </div>

                    <div class="form-check">
                        <input id="retain_id" type="checkbox" name="retain" value="true" class="form-check-input">
                        <label for="retain_id" class="form-check-label">Retain Message:</label>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-secondary">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div id="status">Connection Status: Not Connected</div>
            </div>

            <div class="col-lg-4">
                <h2>Status Messages:</h2>
                <div id="status_messages">
                </div>
            </div>

            <div class="col-lg-4">
                <h2>Received Messages:</h2>
                <div id="out_messages">
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>


<?php $this->section('scripts') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <script src="/assets/js/mqtt_ifridge.js"></script>
<?php $this->endSection() ?>