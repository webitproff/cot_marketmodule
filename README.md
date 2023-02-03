# cot_marketmodule
Модуль "Маркет" с типами, кастомными метатайтлами и описанием
--------
**перед установкой или обновлением полный бекап!!!**
--------
<p>старый модуль лучше удалить вместе с папкой и залить на хост папку market отсюда в папку modules
 В шаблоны своей темы берем теги из модуля PROJECTS что касается типов, и там где PRJEDIT_FORM_TYPE  меняем на PRDEDIT_FORM_TYPE</p>
--------
<p>1. Старый модуль деинсталируем и удаляем папку с хоста.</p>

<p>2. Заливаем новую папку market в&nbsp; modules.</p>

<p>3. Устанавливаем модуль и тут же, вторым действием жмём &quot;ОБНОВИТЬ&quot;!</p>

<p>должно быть такое сообщение</p>

<blockquote>
<p>&nbsp;&nbsp;&nbsp; Обновление Модуль &quot;market&quot;<br />
&nbsp;&nbsp;&nbsp; Удалено связок хуков: 13<br />
&nbsp;&nbsp;&nbsp; Установлено связок хуков: 13<br />
&nbsp;&nbsp;&nbsp; Блокировки авторизации обновлены<br />
&nbsp;&nbsp;&nbsp; Установлен патч modules/market/setup/patch_2.7.1.inc: OK<br />
&nbsp;&nbsp;&nbsp; Модуль &quot;market&quot; обновлен до версии 2.7.1</p>
</blockquote>

<p>если есть сообщение &quot;<span style="color:#e67e22;"><strong>Модуль &quot;market&quot; обновлен до версии 2.7.1</strong></span>&quot;, - только потом идем в администрирование и забиваем свои типы.</p>

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
		&lt;div class=&quot;uk-form-controls&quot;&gt;
			{PRDEDIT_FORM_DATE}
		&lt;/div&gt;
	&lt;/div&gt;
&lt;!-- ENDIF --&gt;	</pre>

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

<p>&nbsp;</p>

<p>P.S. Можно сделать установку обновлением, то есть поверх существующего рабочего модуля, НО перед закачиванием новых файлов поверх старых, комментируем всё с 24-й по 33-тью строки в файле <a href="https://github.com/webitproff/cot_marketmodule/blob/04793de35265941a71d55f885e1a1c3836060e67/market/market.global.php">market.global.php</a>. И только после обновления, когда появится сообщение &quot;<strong>Установлен патч modules/market/setup/patch_2.7.1.inc: OK</strong>&quot; - снимаем коментарий</p>

