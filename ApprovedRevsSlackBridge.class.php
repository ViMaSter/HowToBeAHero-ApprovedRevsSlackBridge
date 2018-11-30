<?php
	class ApprovedRevsSlackBridge
	{
		/**
		 * If a page is updated and the revision ID is bigger than what we receive
		 * from the API, it requires approval. In that case, send a slack-message
		 */
		static public function checkSlackNotificationForRequiredApproval( $article, $user, $content,
			$summary, $isMinor, $isWatch, $section, $flags, $revision,
			$status, $baseRevId ) {

			global $wgWikiUrl, $wgWikiUrlEnding;

			if (ApprovedRevs::getApprovedRevID( $article->getTitle() ) && $revision->getID() != ApprovedRevs::getApprovedRevID( $article->getTitle() ))
			{
				$message = sprintf(
					"Artikel %s wurde von Nutzer %s bearbeitet und benötigt eine Bestätigung um öffentlich gesehen zu werden\r\n%s%s&type=revision&diff=%s&oldid=%s",
					SlackNotifications::getSlackArticleText($article, true),
					SlackNotifications::getSlackUserText($user),
					$wgWikiUrl.$wgWikiUrlEnding,
					$article->getTitle(),
					$revision->getID(),
					ApprovedRevs::getApprovedRevID( $article->getTitle() )
				);
				SlackNotifications::push_slack_notify($message, "yellow", $user);
			}
		}
	}