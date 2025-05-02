<?php
class tagReplacer {
    public function replace ($nameFile, $tagBefore, $tagNew, $output) {

        if(!file_exists($nameFile)) {
            return "File tidak ditemukan";
        }

        $content = file_get_contents($nameFile);

        $pattern = "/<$tagBefore(.*?)>/i";
        $replacement = "<$tagNew$1>";
        $content = preg_replace($pattern, $replacement, $content);

        $patternClose = "/<\/$tagBefore>/i";
        $replacementClose = "</$tagNew>";
        $content = preg_replace($patternClose, $replacementClose, $content);

        if($output === "N") {
            $newFile = pathinfo($nameFile, PATHINFO_FILENAME) . '-new.html';
            file_put_contents($newFile, $content);
            return "File baru: $newFile";
        }
        else {
            file_put_contents($nameFile, $content);
            return "File lama telah diperbarui: $nameFile";
        }
    }
}