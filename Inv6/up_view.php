<?php $this->load->helper('html'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Vista de Up XML</title>
        <meta charset="utf-8"/>
	</head>
        <body>  
            <?php echo br(3); ?>
		     <center>
		          Elije el archivo a Subir.
		      <?php echo br(4); ?>
			     <form action="<?php echo 'subiendo_archivo'; ?>" method="post" enctype="multipart/form-data">
					Selecciona el archivo con extensión .xml .
					<?php echo br(2); ?>
                            <input type="file" name="mi_archivo_1" id="m_archivo_1" size="40">
					<?php echo br(2); ?>
                            <input type="button" value="Borrar" onClick="location='index'"/>
                            <input type="submit" value="Subir" name="submit">
                                <form name="buttonbar">
                                    <?php echo br(2); ?>
                                </form>
                </form>
 		     </center>
		<?php echo br(2); ?>
		</body>
</html>