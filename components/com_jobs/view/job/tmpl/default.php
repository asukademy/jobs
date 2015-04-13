<?php
/**
 * Part of Component Jobs files.
 *
 * @copyright   Copyright (C) 2014 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Jobs\Router\Route;
use Windwalker\View\Helper\ViewHtmlHelper;

// No direct access
defined('_JEXEC') or die;

/**
 * Prepare data for this template.
 *
 * @var $container Windwalker\DI\Container
 * @var $data      Windwalker\Data\Data
 * @var $item      Windwalker\Data\Data
 * @var $params    Joomla\Registry\Registry
 */
$container = $this->getContainer();
$params = $data->item->params;
$item = $data->item;
?>

<form action="<?php echo JUri::getInstance(); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

	<div id="Jobs" class="windwalker item container-fluid job<?php echo $params->get('pageclass_sfx'); ?>">
		<div id="jobs-wrap-inner">

			<div class="job-item item<?php echo $item->state == 0 ? ' well well-small' : ''; ?>">
				<div class="job-item-inner">

					<!-- Heading -->
					<!-- ============================================================================= -->
					<div class="heading">
						<h2><?php echo $params->get('link_titles', 1) ? JHtml::_('link', $item->link, $item->title) : $item->title ?></h2>
					</div>
					<!-- ============================================================================= -->
					<!-- Heading -->

					<!-- afterDisplayTitle -->
					<!-- ============================================================================= -->
					<?php echo $data->item->event->afterDisplayTitle; ?>
					<!-- ============================================================================= -->
					<!-- afterDisplayTitle -->

					<!-- beforeDisplayContent -->
					<!-- ============================================================================= -->
					<?php echo $data->item->event->beforeDisplayContent; ?>
					<!-- ============================================================================= -->
					<!-- beforeDisplayContent -->

					<!-- Info -->
					<!-- ============================================================================= -->
					<div class="info">
						<div class="info-inner">
							公司名稱:
							<?php if ($item->url): ?>
								<a target="_blank" href="<?php echo $this->escape($item->url); ?>">
									<?php echo $this->escape($item->company); ?>
								</a>
							<?php else: ?>
								<span class="uk-text-muted">
									<?php echo $this->escape($item->company); ?>
								</span>
							<?php endif; ?>

							|

							薪資水平: <?php echo number_format($item->salary_min, 0); ?> ~ <?php echo number_format($item->salary_max, 0); ?>

							|

							工作地點:
							<a target="_blank" href="<?php echo 'https://www.google.com.tw/maps/search/' . $this->escape($item->position); ?>">
								<?php echo $this->escape($item->position); ?>
							</a>

						</div>
					</div>

					<hr class="info-separator" />
					<!-- ============================================================================= -->
					<!-- Info -->

					<!-- Content -->
					<!-- ============================================================================= -->
					<div class="content">
						<div class="content-inner row-fluid">

							<div class="span12">
								<?php if (!empty($item->images)): ?>
									<div class="content-img">
										<?php echo JHtml::_('image', $item->images, $item->title); ?>
									</div>
								<?php endif; ?>

								<div class="text">
									<?php echo $item->text; ?>

									<h1>地圖</h1>

									<iframe width="100%" height="350" frameborder="0" style="border:0"
										src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC04nF4KXjfR2VQ0jsFm5vEd9LbyiXqbKw&amp;q=<?php echo $item->position; ?>">
									</iframe>
								</div>
							</div>

						</div>
					</div>
					<!-- ============================================================================= -->
					<!-- Content End -->

					<!-- afterDisplayContent -->
					<!-- ============================================================================= -->
					<?php echo $data->item->event->afterDisplayContent; ?>
					<!-- ============================================================================= -->
					<!-- afterDisplayContent -->

				</div>
			</div>

		</div>
	</div>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="return" value="<?php echo base64_encode(JUri::getInstance()->toString()); ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>        
