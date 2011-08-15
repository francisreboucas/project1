<h2><?php echo sprintf(__('Release Notes for CakePHP %s.', true), Configure::version()); ?></h2>
<a href="http://cakephp.org/changelogs/1.3.11"><?php __('Read the changelog'); ?> </a>
<?php
if (Configure::read() > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<div id="url-rewriting-warning" style="background-color:#e32; color:#fff; padding:3px; margin: 20px 0">
	<?php __('URL rewriting is not properly configured on your server. '); ?>
	<ol style="padding-left:20px">
		<li>
			<a target="_blank" href="http://book.cakephp.org/view/917/Apache-and-mod_rewrite-and-htaccess" style="color:#fff;">
				<?php __('Help me configure it')?>
			</a>
		</li>
		<li>
			<a target="_blank" href="http://book.cakephp.org/view/931/CakePHP-Core-Configuration-Variables" style="color:#fff;">
				<?php __('I don\'t / can\'t use URL rewriting')?>
			</a>
		</li>
	</ol>
</div>
<p>
	<?php
		if (is_writable(TMP)):
			echo '<span class="notice success">';
				__('Your tmp directory is writable.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Your tmp directory is NOT writable.');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$settings = Cache::settings();
		if (!empty($settings)):
			echo '<span class="notice success">';
					printf(__('The %s is being used for caching. To change the config edit APP/config/core.php ', true), '<em>'. $settings['engine'] . 'Engine</em>');
			echo '</span>';
		else:
			echo '<span class="notice">';
					__('Your cache is NOT working. Please check the settings in APP/config/core.php');
			echo '</span>';
		endif;
	?>
</p>
<p>
	<?php
		$filePresent = null;
		if (file_exists(CONFIGS.'database.php')):
			echo '<span class="notice success">';
				__('Your database configuration file is present.');
				$filePresent = true;
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Your database configuration file is NOT present.');
				echo '<br/>';
				__('Rename config/database.php.default to config/database.php');
			echo '</span>';
		endif;
	?>
</p>
<?php
	App::import('Core', 'Validation');
	if (!Validation::alphaNumeric('cakephp')) {
		echo '<p><span class="notice">';
		__('PCRE has not been compiled with Unicode support.');
		echo '<br/>';
		__('Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring');
		echo '</span></p>';
	}
?>
<?php
if (isset($filePresent)):
	if (!class_exists('ConnectionManager')) {
		require LIBS . 'model' . DS . 'connection_manager.php';
	}
	$db = ConnectionManager::getInstance();
	@$connected = $db->getDataSource('default');
?>
<p>
	<?php
		if ($connected->isConnected()):
			echo '<span class="notice success">';
	 			__('Cake is able to connect to the database.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				__('Cake is NOT able to connect to the database.');
			echo '</span>';
		endif;
	?>
</p>
<?php endif;?>
<h3><?php __('Editing this Page'); ?></h3>
<p>
<?php
__('To change the content of this page, create: APP/views/pages/home.ctp.<br />
To change its layout, create: APP/views/layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.');
?>
</p>

<h3><?php __('Getting Started'); ?></h3>
<p>
	<?php
		echo $this->Html->link(
			sprintf('<strong>%s</strong> %s', __('New', true), __('CakePHP 1.3 Docs', true)),
			'http://book.cakephp.org/view/875/x1-3-Collection',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>
<p>
	<?php
		echo $this->Html->link(
			__('The 15 min Blog Tutorial', true),
			'http://book.cakephp.org/view/1528/Blog',
			array('target' => '_blank', 'escape' => false)
		);
	?>
</p>

<h3><?php __('More about Cake'); ?></h3>
<p>
<?php __('CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.'); ?>
</p>
<p>
<?php __('Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.'); ?>
</p>
