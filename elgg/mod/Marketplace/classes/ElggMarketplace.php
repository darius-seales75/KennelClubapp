<?php
/**
 * Extended class to override the time_created
 *
 * @property string $status      The published status of the blog post (published, draft)
 * @property string $comments_on Whether commenting is allowed (Off, On)
 * @property string $breed    A breed of the marketplace listing used when displaying the listing
 * @property int    $new_listing    Whether this is an auto-save (not fully saved) (1 = yes, "" = no)
 */
class ElggMarketplace extends ElggObject {

	/**
	 * {@inheritDoc}
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = "marketplace";
	}

	/**
	 * Can a user comment on this marketplace?
	 *
	 * @see ElggObject::canComment()
	 *
	 * @param int  $user_guid User guid (default is logged in user)
	 * @param bool $default   Default permission
	 *
	 * @return bool
	 *
	 * @since 1.8.0
	 */
	public function canComment($user_guid = 0, $default = null) {
		$result = parent::canComment($user_guid, $default);
		if (!$result) {
			return $result;
		}

		if ($this->comments_on === 'Off' || $this->status !== 'published') {
			return false;
		}
		
		return true;
	}

	/**
	 * Get the breed for this marketplace listing
	 *
	 * @param int $length Length of the excerpt (optional)
	 * @return string
	 * @since 1.9.0
	 */
	public function getBreed($length = 250) {
		$breed = $this->breed ?: $this->date_of_birth;
		
		return elgg_get_breed($breed, $length);
	}

}
