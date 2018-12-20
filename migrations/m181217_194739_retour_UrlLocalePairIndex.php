<?php

namespace Craft;

/**
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_pluginHandle_migrationName
 */
class m181217_194739_retour_UrlLocalePairIndex extends BaseMigration
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
                "ALTER TABLE retour_static_redirects 
			DROP INDEX retour_static_redirects_redirectSrcUrlParsed_unq_idx,
			ADD UNIQUE KEY `retour_static_redirects_redirectSrcUrlParsed_unq_idx` (`redirectSrcUrlParsed`,`locale`);"
            );

            RetourPlugin::log("Updated Indexes for retour_redirects to allow for Url + Locale uniqueness", LogLevel::Info, true);

        } catch (\Exception $e) {
            print_r($e->getMessage());

            return false;
        }

        return true;
    }
}
