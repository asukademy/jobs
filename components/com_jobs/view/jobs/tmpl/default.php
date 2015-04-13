<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Windwalker\Data\Data;

// No direct access
defined('_JEXEC') or die;

JHtmlBootstrap::tooltip();

/**
 * Prepare data for this template.
 *
 * @var $container Windwalker\DI\Container
 * @var $data      Windwalker\Data\Data
 * @var $state     Joomla\Registry\Registry
 * @var $user      \JUser
 * @var $this      Windwalker\View\Html\ItemHtmlView
 */
$container = $this->getContainer();
$data      = $this->data;
$state     = $data->state;
$user      = $container->get('user');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jobs&view=jobs'); ?>" method="post" name="adminForm" id="adminForm">

	<div id="jobs-wrap" class="windwalker list container-fluid jobs<?php echo $data->params->get('pageclass_sfx'); ?>">
		<div id="jobs-wrap-inner">

			<!-- Heading -->
			<?php if ($data->params->get('show_page_heading', 1)) : ?>
				<h1>
					<?php echo $this->escape($data->params->get('page_heading')); ?>
				</h1>
			<?php endif; ?>

			<?php if ($data->params->get('show_category_title') or $data->params->get('page_subheading')) : ?>
				<h2>
					<?php echo $this->escape($data->params->get('page_subheading')); ?>
					<?php if ($data->params->get('show_category_title')) : ?>
						<span class="subheading-category"><?php echo $this->escape($data->category->title); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>
			<!-- Heading End -->

			<!-- Category Description -->
			<?php if ($data->params->get('show_description', 1) || $data->params->def('show_description_image', 1)) : ?>
				<div class="category-desc">
					<?php
					if ($data->params->get('show_description_image') && $data->category->params->get('image'))
					{
						echo JHtml::image($data->category->params()->get('image'), 'Desc Image');
					}

					if ($data->params->get('show_description') && $data->category->description)
					{
						echo JHtml::_('content.prepare', $data->category->description, '', 'com_jobs.category');
					}
					?>
					<div class="clr"></div>
				</div>
			<?php endif; ?>
			<!-- Category Description End -->

			<!-- Jobs List -->
			<div id="jobs-wrap">

				<!--Columns-->
				<?php if (!empty($data->items)) : ?>

					<table class="uk-table uk-table-striped">
						<tbody>

						<?php
						foreach ($data->items as $key => &$item)
						:
							$item = new Data($item);
						?>
							<tr class="item">
								<td>
									<span class="uk-badge <?php echo \Jobs\Helper\TypeHelper::getTypeLabel($item->type) ?>">
										<?php echo $this->escape(JText::_('COM_JOBS_TYPE_' . $item->type)); ?>
									</span>
								</td>
								<td>
									<a href="<?php echo \Jobs\Router\Route::_('job', ['id' => $item->id]) ?>">
										<?php echo $this->escape($item->title); ?>
									</a>
								</td>
								<td>
									<?php if ($item->url): ?>
									<a class="uk-text-muted" href="<?php echo $this->escape($item->url); ?>">
										<?php echo $this->escape($item->company); ?> <span class="uk-icon-share-square-o"></span>
									</a>
									<?php else: ?>
										<span class="uk-text-muted">
											<?php echo $this->escape($item->company); ?>
										</span>
									<?php endif; ?>
								</td>

								<td>
									<span class="uk-text-muted">
										<i class="uk-icon-home"></i>
										<?php echo $this->escape($item->position); ?>
									</span>
								</td>
							</tr>

						<?php endforeach; ?>


						</tbody>
					</table>

				<?php endif; ?>
				<!--Columns End-->

				<!--Pagination-->
				<?php if (($data->params->def('show_pagination', 1) == 1 || ($data->params->get('show_pagination') == 2)) && ($data->pagination->get('pages.total') > 1)) : ?>
					<div class="pagination">
						<?php if ($data->params->def('show_pagination_results', 1)) : ?>
							<p class="counter">
								<?php echo $data->pagination->getPagesCounter(); ?>
							</p>
						<?php endif; ?>

						<?php echo $data->pagination->getPagesLinks(); ?>
					</div>
				<?php endif; ?>
				<!--Pagination End-->

			</div>
		</div>

		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="return" id="return_url" value="<?php echo base64_encode(JUri::getInstance()->toString()); ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>

</form>