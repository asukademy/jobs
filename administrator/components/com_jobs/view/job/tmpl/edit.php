<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

JHtmlBootstrap::tooltip();
JHtmlFormbehavior::chosen('select');
JHtmlBehavior::formvalidation();

/**
 * Prepare data for this template.
 *
 * @var $container Windwalker\DI\Container
 * @var $data      Windwalker\Data\Data
 * @var $item      \stdClass
 */
$container = $this->getContainer();
$form      = $data->form;
$item      = $data->item;

// Setting tabset
$tabs = array(
	'tab_basic'
)
?>
<!-- Validate Script -->
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'job.edit.cancel' || document.formvalidator.isValid(document.id('adminForm')))
		{
			Joomla.submitform(task, document.getElementById('adminForm'));
		}
	}
</script>

<div id="jobs" class="windwalker job edit-form row-fluid">
	<form action="<?php echo JURI::getInstance(); ?>"  method="post" name="adminForm" id="adminForm"
		class="form-validate" enctype="multipart/form-data">

		<?php echo JHtmlBootstrap::startTabSet('jobEditTab', array('active' => 'tab_basic')); ?>

			<?php
			foreach ($tabs as $tab)
			{
				echo $this->loadTemplate($tab, array('tab' => $tab));
			}
			?>

		<?php echo JHtmlBootstrap::endTabSet(); ?>

		<!-- Hidden Inputs -->
		<div id="hidden-inputs">
			<input type="hidden" name="option" value="com_jobs" />
			<input type="hidden" name="task" value="" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>

