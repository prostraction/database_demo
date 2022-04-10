<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Конструктор ПК</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<p> <b>Материнская плата: </b></p>
    <form>
		<p> <label> <span id="value_motherboard"> </span> </label> </p>
        <label> <input type="text" id="search_motherboard" placeholder="Начните вводить..." /> </label>
    </form>	
	<!-- Контейнер для результатов поиска -->
    <div id="display_motherboard"></div>

	<p><b>	Процессор (CPU): </b></p>
    <form>
		<p> <label> <span id="value_cpu"> </span> </label> </p>
        <label> <input type="text" id="search_cpu" placeholder="Начните вводить..." /> </label>
		<div id="display_cpu"></div>
    </form>

     
	<p> <b>Кулер процессора (CPU): </b> </p>
    <form>
        <p> <label> <span id="value_cpu_fan"> </span> </label> </p>
		<label> <input type="text" id="search_cpu_fan" placeholder="Начните вводить..." /> </label>
    </form>
	<div id="display_cpu_fun"></div>
	
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