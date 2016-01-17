﻿Установка Yii виджет для вывода баннеров
=================================

Для установки виджета файл "Banner.php" следует поместить в папку "/protected/components/".

Папку с шаблонами баннеров "banners" в папку "/protected/components/views/".
В ней уже содержатся два тестовых шаблона "superbanner.php" и "superbanner2.php".

Пример
=================================

В [примере](http://xn--b1aecaq6ap8c.xn--p1ai/yii/demos/blog/#25) внизу страницы показ баннеров вызывается 4 раза следующим кодом:

```
	<?php $this->widget('Banner', array("percentage" => "50", "template" => "superbanner")); ?>
	<?php $this->widget('Banner', array("percentage" => "60", "template" => "superbanner2")); ?>
	<?php $this->widget('Banner', array("percentage" => "20", "template" => "superbanner")); ?>
	<?php $this->widget('Banner', array("percentage" => "30", "template" => "superbanner2")); ?>
``` 

Передав id баннера в хеше страница будет отскроллена к нужному баннеру, обведенному красной рамкой.
Параметры выода: "percentage" - количество отображаемых банеров в процентах от оставшихся для данного типа, "template" - имя шаблона баннера.

Параметры класса
=================================

После каждого вызова виджета отображается информация о названии шаблона, количестве показанных и оставшихся баннеров. 
Для ее скрытия установить константу "TEST_MODE" в "false".

Количество показов баннеров по-умолчанию задается константой "DEFAULT_SHOW_CNT".
Количество показов баннеров для каждого отдельного типа можно задать в массиве "counter": "banner_template_name" => "count".