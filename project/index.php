<?php 
        include "header.php";
        $filesDir = "./posts";
        $files = scan_dir($filesDir);
        

        $filesContent = [];
        
        foreach($files as &$item){
            if($item !== "." && $item !== ".."){
                $filesContent[$item] = file_get_contents($filesDir . '/' . $item);
            }
        }
        

        function scan_dir($dir) {
            $ignored = array('.', '..', '.svn', '.htaccess');
        
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
  <div class="container">

<?php include "footer.php"?>

<?php foreach($files as &$item){ ?>
<div class="col-lg-12">
    <h2><?php echo $item ?></h2>
    <p><?php echo $filesContent[$item] ?></p>
</div>
<?php } ?>

</div>