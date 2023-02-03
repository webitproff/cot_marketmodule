# cot_marketmodule
Модуль "Маркет" с типами, кастомными метатайтлами и описанием
<p><a href="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_4.png"><img alt="" src="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_4.png" /></a></p>
--------
**перед установкой или обновлением полный бекап!!!**
--------
<p><strong>Проверял два раза, только установка с нуля! всё старое вычищаем</strong>, качаем <a href="https://github.com/webitproff/cot_marketmodule">новый модуль с репозитория</a></p>

<p>1. Старый модуль деинсталируем и удаляем папку с хоста.
в phpMyAdmin проверяем, чтобы не было таблиц
flance_market
flance_market_types
</p>

<p>2. Заливаем новую папку <strong>market</strong> в&nbsp; modules.</p>

<p>3. Устанавливаем модуль и тут же идем в администрирование и забиваем свои типы.</p>

<p>никакого <code class="as3 plain">PHP.forpro </code> в TPL шаблонах маркета и близко быть не должно, - только то, что касается типов, которые забиваем в администрировании модуля</p>

<p>4. add next code in <span style="color:#2980b9;"><strong>market.add.tpl</strong></span></p>

<pre class="brush:as3;">
	&lt;!-- IF {PHP.market_types} --&gt;
          &lt;div class=&quot;uk-margin&quot;&gt;
            &lt;h4 class=&quot;uk-heading-divider uk-text-primary uk-margin-remove&quot;&gt;{PHP.L.Type}:&lt;/h4&gt;
            &lt;div class=&quot;uk-form-controls&quot; &gt;
               {PRDADD_FORM_TYPE} 
            &lt;/div&gt;
          &lt;/div&gt;
&lt;!-- ENDIF --&gt;	</pre>

<p>5. add next code in <span style="color:#2980b9;"><strong>market.edit.tpl</strong></span></p>


<pre class="brush:as3;">
&lt;!-- IF {PHP.market_types} --&gt;
          &lt;div class=&quot;uk-margin&quot;&gt;
            &lt;h4 class=&quot;uk-heading-divider uk-text-primary uk-margin-remove&quot;&gt;{PHP.L.Type}:&lt;/h4&gt;
            &lt;div class=&quot;uk-form-controls&quot; &gt;
               {PRDEDIT_FORM_TYPE} 
            &lt;/div&gt;
          &lt;/div&gt;
&lt;!-- ENDIF --&gt;
	   &lt;!-- IF {PHP.usr.isadmin} --&gt;
		   &lt;div class=&quot;uk-margin&quot;&gt;
			 &lt;h4 class=&quot;uk-heading-divider uk-text-primary uk-margin-remove&quot;&gt;{PHP.L.Date}:&lt;/h4&gt;
			 &lt;label class=&quot;uk-form-label&quot;&gt;&lt;/label&gt;
			 &lt;div class=&quot;uk-form-controls&quot;&gt; {PRDEDIT_FORM_DATE} &lt;/div&gt;
		   &lt;/div&gt;
	   &lt;!-- ELSE --&gt;
		   &lt;!-- IF {PHP.cot_plugins_active.paypro} AND {PHP|cot_getuserpro()} --&gt;
		   &lt;div class=&quot;uk-margin&quot;&gt;
			 &lt;h4 class=&quot;uk-heading-divider uk-text-primary uk-margin-remove&quot;&gt;{PHP.L.Date}:&lt;/h4&gt;
			 &lt;label class=&quot;uk-form-label&quot;&gt;&lt;/label&gt;
			 &lt;div class=&quot;uk-form-controls&quot;&gt; {PRDEDIT_FORM_DATE} &lt;/div&gt;
		   &lt;/div&gt;
		   &lt;!-- ELSE --&gt;
		   &lt;div class=&quot;uk-margin&quot;&gt;
			 &lt;h4 class=&quot;uk-heading-divider uk-text-primary uk-margin-remove&quot;&gt;{PHP.L.Date}:&lt;/h4&gt;
			 &lt;label class=&quot;uk-form-label&quot;&gt;&lt;/label&gt;
			 &lt;div class=&quot;uk-form-controls&quot;&gt; {PHP.item.item_date|cot_date(&#39;d-m-Y&#39;, $this)} &lt;/div&gt;
		   &lt;/div&gt;
		   &lt;!-- ENDIF --&gt;
	   &lt;!-- ENDIF --&gt;</pre>


<p>6. add next code in <span style="color:#2980b9;"><strong>market.tpl</strong></span></p>

<pre class="brush:as3;">
    &lt;!-- IF {PHP.market_types} --&gt;
		&lt;li&gt;
		&lt;div class=&quot;uk-grid-small&quot; uk-grid&gt;
			&lt;div class=&quot;uk-width-expand uk-flex uk-flex-bottom&quot; uk-leader=&quot;fill: -&quot;&gt;
				&lt;span class=&quot;uk-link-text&quot;&gt;{PHP.L.Type}:&lt;/span&gt;
			&lt;/div&gt;
			&lt;div&gt;
				&lt;span class=&quot;uk-label&quot;&gt;{PRD_TYPE}&lt;/span&gt;
			&lt;/div&gt;
		&lt;/div&gt;
		&lt;/li&gt;
    &lt;!-- ENDIF --&gt;</pre>

<p>7. add next code in <span style="color:#2980b9;"><strong>market.list.tpl </strong></span>in search form</p>

<pre class="brush:as3;">
&lt;!-- BEGIN: PTYPES --&gt;
&lt;div class=&quot;uk-margin&quot;&gt;
	&lt;ul class=&quot;uk-list uk-list-divider&quot;&gt;
		&lt;li&lt;!-- IF {PTYPE_ALL_ACT} --&gt; class=&quot;active&quot;&lt;!-- ENDIF --&gt;&gt;&lt;a href=&quot;{PTYPE_ALL_URL}&quot;&gt;{PHP.L.All}&lt;/a&gt;&lt;/li&gt;
		&lt;!-- BEGIN: PTYPES_ROWS --&gt;
		&lt;li&lt;!-- IF {PTYPE_ROW_ACT} --&gt; class=&quot;active&quot;&lt;!-- ENDIF --&gt;&gt;&lt;a href=&quot;{PTYPE_ROW_URL}&quot;&gt;{PTYPE_ROW_TITLE}&lt;/a&gt;&lt;/li&gt;
		&lt;!-- END: PTYPES_ROWS --&gt;
	&lt;/ul&gt;
&lt;/div&gt;	
&lt;!-- END: PTYPES --&gt;</pre>

<p>И всё, больше в шаблоны ничего не добавляем!</p>

<p><a href="https://abuyfile.com/market/cotonti?type=1"><strong>Вот в работе</strong></a>.</p>

<p><a href="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_3.png"><img alt="" src="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_3.png" style="width:200px;height:143px;" /></a></p>

<p><a href="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_4.png"><img alt="" src="https://raw.githubusercontent.com/webitproff/cot_marketmodule/main/market_types_4.png" style="width:200px;height:88px;" /></a></p>

<p>&nbsp;</p>

<p><span style="color:#e74c3c;"><strong>Важно!</strong></span> Если после установки/обновления пропали какие либо надписи в маркете на фронтэнде - смотрим новый файл локализации <a class="branch-name" href="https://github.com/webitproff/cot_marketmodule/blob/80247826e43aecda94c21edff65efb19464bc3ab/market/lang/market.ru.lang.php">market.ru.lang.php</a></p>



--------
<ul class="list">
<li><a href="https://t.me/cotonti" target="_blank">Телеграм по Cotonti</a></li>
<li><a href="https://t.me/script_freelance_marketplace" target="_blank">Телеграм по сборке Фриланс-Маркетплейса</a></li>
</ul>
<p>&nbsp;</p>
