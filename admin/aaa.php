<?php if($_POST['rowid']) {
        $id = $_POST['rowid']; ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="wrrapper">
  <div class="drrop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
 
      <div class="desc">
        your files to Assets, or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div> 
    <output id="lisst"></output><input type="text" name="idbrg" value="<?php echo $id;?>"><input id="files"  name="files[]" type="file" multiple/>
  </div><div class="submit-gambar"><button  type="submit" class="btn tombol-gambar">TAMBAHKAN</button></div>
</div></button></form> <?php }?>
<script type="text/javascript">
var drop = $("input");
drop
  .on("dragenter", function(e) {
    $(".drrop").css({
      border: "4px dashed #09f",
      background: "rgba(0, 153, 255, .05)"
    });
    $(".cont").css({
      color: "#09f"
    });
  })
  .on("dragleave dragend mouseout drop", function(e) {
    $(".drrop").css({
      border: "3px dashed #DADFE3",
      background: "transparent"
    });
    $(".cont").css({
      color: "#8E99A5"
    });
  });

function handleFileSelect(evt) {
  var files = evt.target.files; // FileList object

  // Loop through the FileList and render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    // Only process image files.
    if (!f.type.match("image.*")) {
      continue;
    }

    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {
        // Render thumbnail.
        var span = document.createElement("span");
        span.innerHTML = [
          '<img class="thumb" src="',
          e.target.result,
          '" title="',
          escape(theFile.name),
          '"/>'
        ].join("");
        document.getElementById("lisst").insertBefore(span, null);
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
  }
}

$("#files").change(handleFileSelect);
 </script>

