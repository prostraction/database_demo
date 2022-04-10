<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Конструктор ПК</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<p> <b>Материнская плата: </b></p>
    <form>
		<label> <input type="text" id="value_motherboard" value="123"/>456</label>
        <label> <input type="text" id="search_motherboard" placeholder="Начните вводить..." /> </label>
    </form>
	
	<!-- Контейнер для результатов поиска -->
    <div id="display_motherboard"></div>

	<p> <b>Процессор (CPU): </b></p>
    <form>
        <label>
            <input type="text" id="cpu" placeholder="Начните вводить..." />
        </label>
    </form>
     
	<p> <b>Кулер процессора (CPU): </b> </p>
    <form>
        <label>
            <input type="text" id="cpu_fan" placeholder="Начните вводить..." />
        </label>
    </form>
	
	<p> <b>Оперативная память (RAM): </b> </p>
    <form>
        <label>
            <input type="text" id="ram" placeholder="Начните вводить..." />
        </label>	
    </form>
	<form>
		<button id="add_ram" disabled="disabled">
			 Добавить планку оперативной памяти
		</button>
	</form>
	
	<p> <b>Накопители информации: </b></p>
	<form>  
        <label>Количество жестких дисков и SSD накопителей: </label>
		<div>
			<input type="number" name="sata_count" min="0" max="50">
			<div>
				<label>Количество M.2 накопителей: </label>  
				<div>
					<input type="number" name="m2_count" min="0" max="50"> 
				</div>
			</div>
		</div>
    </form> 

	<p> <b>Видеокарта (GPU) </b></p>
    <form>
        <label>
            <input type="text" id="gpu" placeholder="Начните вводить..." />
        </label>	
    </form>
	<form>
		<button id="add_ram" disabled="disabled">
			 Добавить видеокарту
		</button>
	</form>
	
	<p> <b>Блок питания (PSU):</b></p>
        <label>
            <input type="text" id="psu" placeholder="Начните вводить..." />
        </label>	
    </form>
	
	<p><b>Корпус: </b></p>
    <form>
        <label>
            <input type="text" id="pc_case" placeholder="Начните вводить..." />
        </label>	
    </form>
	
	<p></p>
	<form>
		<button id="check">
			 Проверить совместимость
		</button>
	</form>

</body>
</html>