# cot_marketmodule
Модуль "Маркет" с типами, кастомными метатайтлами и описанием
*** перед установкой или обновлением полный бекап!!! ***
--------
старый модуль лучше удалить вместе с папкой и залить на хост папку market отсюда в папку modules
 В шаблоны своей темы берем теги из модуля PROJECTS что касается типов, и там где PRJEDIT_FORM_TYPE  меняем на PRDEDIT_FORM_TYPE
 в market.list.tpl вставляем:
<pre class="brush:as3;">
		&lt;!-- BEGIN: PTYPES --&gt;
		&lt;ul class=&quot;nav nav-tabs&quot;&gt;
			&lt;li&lt;!-- IF {PTYPE_ALL_ACT} --&gt; class=&quot;active&quot;&lt;!-- ENDIF --&gt;&gt;&lt;a href=&quot;{PTYPE_ALL_URL}&quot;&gt;{PHP.L.All}&lt;/a&gt;&lt;/li&gt;
			&lt;!-- BEGIN: PTYPES_ROWS --&gt;
			&lt;li&lt;!-- IF {PTYPE_ROW_ACT} --&gt; class=&quot;active&quot;&lt;!-- ENDIF --&gt;&gt;&lt;a href=&quot;{PTYPE_ROW_URL}&quot;&gt;{PTYPE_ROW_TITLE}&lt;/a&gt;&lt;/li&gt;
			&lt;!-- END: PTYPES_ROWS --&gt;
		&lt;/ul&gt;	
		&lt;!-- END: PTYPES --&gt;</pre>
