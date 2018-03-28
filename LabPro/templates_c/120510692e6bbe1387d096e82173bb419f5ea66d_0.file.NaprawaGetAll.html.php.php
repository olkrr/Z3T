<?php
/* Smarty version 3.1.31, created on 2018-02-10 02:30:07
  from "C:\xampp\htdocs\Lab8\templates\NaprawaGetAll.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7e4b1f560307_94225778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '120510692e6bbe1387d096e82173bb419f5ea66d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Lab8\\templates\\NaprawaGetAll.html.php',
      1 => 1518226202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7e4b1f560307_94225778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12798924675a7e4b1f523489_06779069', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6928227815a7e4b1f5253d8_18523647', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.html.php");
}
/* {block 'title'} */
class Block_12798924675a7e4b1f523489_06779069 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_12798924675a7e4b1f523489_06779069',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Lista Napraw<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_6928227815a7e4b1f5253d8_18523647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6928227815a7e4b1f5253d8_18523647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Lista Napraw</h1>
<?php if (isset($_smarty_tpl->tpl_vars['naprawy']->value)) {
if (count($_smarty_tpl->tpl_vars['naprawy']->value) === 0) {?>
	<b>Brak Zapisanych Napraw!</b><br/><br/>
<?php } else { ?>

<table>
   <thead>
      <tr>
		<td><a>ID</a></td>
        <td><a>Klient</a></td>
        <td><a>Producent</a></td>
        <td><a>Model Myjki</a></td>
        <td><a>Typ Myjki</a></td>
        <td><a>Osprzęt</a></td>
        <td><a>Wycena?</a></td>
        <td><a>Data Dostarczenia</a></td>
        <td><a>Data Odbioru</a></td>
        <td><a>Należność</a></td>
        <td><a>Opis</a></td>
        <td><a>Status</a></td>
        <td></td>
        <td></td>
    </tr>
</thead>
<tbody>



<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['naprawy']->value, 'naprawa', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['naprawa']->value) {
?>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDNaprawa'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDKlient'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDProducent'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['NazMyjki'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['TypMyjki'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['NrOsprzet'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['Wycena'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['DataDost'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['DataOdbi'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['KwotaNap'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['OpisNapr'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDStatus'];?>
</td>



    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Naprawa/editform/<?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDNaprawa'];?>
">edytuj</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Naprawa/delete/<?php echo $_smarty_tpl->tpl_vars['naprawa']->value['IDNaprawa'];?>
">usuń</a></td>
                </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


	</tbody>
</table>
<?php }
}
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }
}
}
/* {/block 'body'} */
}
