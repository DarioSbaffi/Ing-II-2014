<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador con paginador codeIgniter</title>
<style type="text/css">
    body{ background-color: #111; }
    #buscador{ width: 500px; background-color: #333; color: #fff;
			   padding: 20px; margin: 100px 0px 0px 350px; }
    #buscador input[type=text]{ padding: 10px; background-color: indianred;
								color: #fff; font-weight: bold; border-radius: 4px;
								width: 250px; margin-left: 30px; }
    #buscador input[type=submit]{ padding: 10px; background-color: sandybrown;
								  color: #222; border-radius: 4px; width: 150px }
    #buscador span{ color: #fff; font-weight: bold; font-size: 14px; text-align: center; }
</style>
</head>
<body>
    <div id="buscador">
    <span><?php echo validation_errors(); ?></span>
    <?=form_open('catalogos/validar')?>
    <input type="text" name="buscando" id="buscando"></br>
    <input type="checkbox" name="Titulo" value="Titulo">Titulo</br>
    <input type="checkbox" name="Resena" value="Rese&ntildea">Rese&ntildea</br>
    <input type="checkbox" name="Autor" value="Autor">Autor</br>
    <input type="checkbox" name="Editorial" value="Editorial">Editorial</br>
	<input type="checkbox" name="Categoria" value="Categoria">Categoria</br>
    
    <input type="submit" value="Buscar">
    <?=form_close()?>
    </div>
</body>
</html>
