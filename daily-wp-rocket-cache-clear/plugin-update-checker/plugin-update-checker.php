<?php
class Puc_v4_Factory {
    public static function buildUpdateChecker($repoUrl, $pluginFile, $slug) {
        return new PluginUpdateChecker($repoUrl, $pluginFile, $slug);
    }
}
class PluginUpdateChecker {
    public function __construct($repoUrl, $pluginFile, $slug) {}
    public function getVcsApi() { return $this; }
    public function enableReleaseAssets() {}
    public function setAuthentication($token) {}
}
?>
