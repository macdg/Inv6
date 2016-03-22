<?php $this->load->helper('html','form','url','checkbox');
$this->load->library('form_validation');
$this->input->post('datos_concepto');
$datos_concepto['id_uuid']=$id_uuid;

?>
<head>
<title>Ingresar Datos</title>
</head>
<div> 
    <?php if(isset($mdescrip)):
    echo validation_errors();
    echo br(1). heading('XML 2', 2); ?>

        <table border border=1 width="700">
            <tr>
                <th width="400">UUID:
                    <?php echo $id_uuid;   ?>
                </th>
            </tr>
        </table>
        <table border=1 width="900">
            <tr>
                <?php  for ($i=0; $i<$cont; $i++):  ?>
                    <td width="300">Cantidad:
                        <?php echo $cantidad[$i]; endfor; ?>
                    </td>
            </tr>
        </table>

        <table border=1 width="900">
            <tr>
                <?php for ($i=0; $i<$cont; $i++): echo form_open('index.php/up_xml/borrar');  ?>
                <td width="400">Descripción:
                        <?php echo br(1). $descrip[$i];   ?> 
                        <hr>
                        <?php echo 'Seleccione descripción a eliminar.'. br(1);
                        $datoss = array('name' => 'quitar[]',
                                        'id' => 'quitar',
                                        'value' => $item['id']=$i,
                                        'checked' => FALSE,
                                        'style' => 'margen: 10px',
                                        ); 
                                echo form_hidden ('nombre', $datos_concepto);
                                echo form_hidden ('cantidad', $cantidad);
                                echo form_hidden ('descripcion', $descrip); 
                                echo form_hidden ('cuantos', $cont);
                                echo form_hidden ('valor', $val_unit);
                                echo form_hidden ('unidad', $unidad);
                                echo form_hidden ('datoss', $datoss);
                                echo br(1);
                                if (! is_null($datoss['value']) ):
                                    echo form_checkbox($datoss, $datos_concepto);
                                    echo form_submit('borrar', 'Eliminar');
                                endif;                 
                    endfor; echo form_close();  ?>
                </td> 
            </tr>
        </table>
   <?php endif;  ?>
</div>

<div>
    <?php   if(isset($mcantidad)): echo form_open('index.php/up_xml/solicitar2'). br(1);?> <hr> <?php echo heading('Ingresar Productos', 2);  
                foreach ($cantidad as $key => $value):
                    echo br(1).'LINEA DE PRODUCTO<hr>';
                    for ($k=1; $k<=$value; $k++):?>
                        <?php echo 'Valor a Ingresar: '.$k. '  de ' . form_label('Cantidad: ', 'cantidad');
                            $datos_in_cantidad = array(
                                                       'name' => 'canti[]',
                                                       'id'   => 'canti',
                                                       'value'=> $value,
                                                       'style'=> 'width:30',
                                                        );
                            echo form_input($datos_in_cantidad);
                            echo br(1);
                            echo form_label('Ingrese Número de Serie: ', 'numserie');
                            $datos_in_numserie = array(
                                                       'name' => 'noserie[]',
                                                       'id'   => 'noserie',
                                                       'value'=> '',
                                                       'style'=> 'width:100',
                                                        );
                            echo form_input($datos_in_numserie);
                            echo br(1);
                    endfor;
                endforeach; ?>    
                            
    <center> 
                           <?php   echo form_submit('Aceptar', 'Aceptar').form_reset('Reset', 'Reset');
                           echo form_close().br(2);
            endif;  ?>
    </center> 
</div>
