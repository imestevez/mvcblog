<?php
//file: view/posts/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$post = $view->getVariable("post");
$currentuser = $view->getVariable("currentusername");
$newcomment = $view->getVariable("comment");
$errors = $view->getVariable("errors");

$view->setVariable("title", "View Post");

?><h1><?= e(i18n("Post").": ".$post->getTitle()) ?></h1>
<em><?= e(sprintf(i18n("by %s"),$post->getAuthor()->getUsername())) ?></em>
<p>
	<?= e($post->getContent()) ?>
</p>

<h2><?= i18n("Comments") ?></h2>

<?php foreach($post->getComments() as $comment): ?>
	<hr>
	<p><?= e(sprintf(i18n("%s commented..."),$comment->getAuthor()->getUsername())) ?> </p>
	<p><?= e($comment->getContent()); ?></p>
<?php endforeach; ?>

<?php if (isset($currentuser) ): ?>
	<h3><?= i18n("Write a comment") ?></h3>

	<form method="POST" action="index.php?controller=comments&amp;action=add">
		<?= i18n("Comment")?>:<br>
		<?= isset($errors["content"])?i18n($errors["content"]):"" ?><br>
		<textarea type="text" name="content"><?=
		e($newcomment->getContent());
		?></textarea>
		<input type="hidden" name="id" value="<?= e($post->getId()) ?>" ><br>
		<input type="submit" name="submit" value="<?=i18n("do comment") ?>">
	</form>

<?php endif ?>
