<?php 
        include "header.php";
        require_once 'libs/Parsedown.php';
        
        $folersDirectory = "./posts";
        $postFolders = scan_dir($folersDirectory);
        
        $parsedown = new Parsedown();
        
        function scan_dir($dir) {
            $ignored = array('.', '..');
        
            $files = array();    
            foreach (scandir($dir) as $file) {
                if (in_array($file, $ignored)) continue;
                $files[$file] = filemtime($dir . '/' . $file);
            }
        
            arsort($files);
            $files = array_keys($files);
        
            return ($files) ? $files : false;
        }
    ?>
         
<?php 
        foreach($postFolders as &$folder){ 
            $content = scan_dir($folersDirectory . "/" . $folder);
            ?>
        <div class="col-lg-12">
            <h2><?php echo $folder ?></h2>
            <p><?php echo $parsedown->text(file_get_contents($folersDirectory . "/" . $folder . "/brief.md")) ?></p>
        </div>
        <?php } ?>


<php include "footer.php" />