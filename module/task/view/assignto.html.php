<?php
/**
 * The complete file of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Jia Fu <fujia@cnezsoft.com>
 * @package     task
 * @version     $Id: complete.html.php 935 2010-07-06 07:49:24Z jajacn@126.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div id='mainContent' class='main-content'>
  <div class='center-block'>
    <div class='main-header'>
      <h2>
        <span class='label label-id'><?php echo $task->id;?></span>
        <?php echo isonlybody() ? $task->name : html::a($this->createLink('task', 'view', 'task=' . $task->id), $task->name);?>
        <small> <?php echo $lang->arrow . (empty($task->team) ? $lang->task->assign : $lang->task->transfer);?></small>
      </h2>
    </div>
    <form method='post' target='hiddenwin'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo empty($task->team) ? $lang->task->assign : $lang->task->transferTo;?></th>
          <td class='w-p25-f'><?php echo html::select('assignedTo', $members, $task->assignedTo, "class='form-control chosen'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->task->left;?></th>
          <td><div class='input-group'><?php echo html::input('left', $task->left, "class='form-control' autocomplete='off'");?> <span class='input-group-addon'><?php echo $lang->task->hour;?></span></div></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->comment;?></th>
          <td colspan='2'><?php echo html::textarea('comment', '', "rows='6' class='form-control w-p98'");?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
            <?php echo html::linkButton($lang->goback, $this->session->taskList);?>
          </td>
        </tr>
      </table>
    </form>
    <hr class='small' />
    <div class='main'><?php include '../../common/view/action.html.php';?></div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
