<h1>Fa</h1>
<img src="<?=$this->escape($logo)?>" class="fa_logo" alt="<?=$this->text("alt_logo")?>">
<p>Version: <?=$this->escape($version)?></p>
<p>
    Copyright 2017-2021 <a href="http://3-magi.net/" target="_blank">Christoph M.
    Becker</a>
</p>
<p>
    Powered by <a href="http://fontawesome.io" target="_blank">Font Awesome by
    Dave Gandy</a>.
</p>
<div style="clear:both"></div>
<div class="fa_syscheck">
    <h2><?=$this->text('syscheck_title')?></h2>
<?php foreach ($checks as $check):?>
    <p class="xh_<?=$this->escape($check->state)?>"><?=$this->text('syscheck_message', $check->label, $check->stateLabel)?></p>
<?php endforeach?>
</div>
