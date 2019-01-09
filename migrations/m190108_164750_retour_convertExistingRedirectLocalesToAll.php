<?php
namespace Craft;

/**
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_pluginHandle_migrationName
 */
class m190108_164750_retour_convertExistingRedirectLocalesToAll extends BaseMigration
{
	/**
	 * Any migration code in here is wrapped inside of a transaction.
	 *
	 * @return bool
	 */
	public function safeUp()
	{
        try {
            $this->execute(
                "UPDATE retour_static_redirects set locale = 'all'"
            );

            RetourPlugin::log("Updated existing static redirects's locale to be 'all'", LogLevel::Info, true);

        } catch (\Exception $e) {
            print_r($e->getMessage());

            return false;
        }

    }
}
