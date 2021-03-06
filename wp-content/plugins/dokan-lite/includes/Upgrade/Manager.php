<?php

namespace WeDevs\Dokan\Upgrade;

class Manager {

    private $is_upgrading_db_key = 'dokan_is_upgrading';

    /**
     * Checks if update is required or not
     *
     * @since DOKAN_LITE_SINCE
     *
     * @return bool
     */
    public function is_upgrade_required() {
        /**
         * Filter to upgrade is required or not
         *
         * @since DOKAN_LITE_SINCE
         *
         * @param bool $is_required Is upgrade required
         */
        return apply_filters( 'dokan_upgrade_is_upgrade_required', false );
    }

    /**
     * Checks for any ongoing process
     *
     * @since DOKAN_LITE_SINCE
     *
     * @return bool
     */
    public function has_ongoing_process() {
        return !! get_option( $this->is_upgrading_db_key, false );
    }

    /**
     * Get upgradable upgrades
     *
     * @since DOKAN_LITE_SINCE
     *
     * @return array
     */
    public function get_upgrades() {
        $upgrades = get_option( $this->is_upgrading_db_key, null );

        if ( ! empty( $upgrades ) ) {
            return $upgrades;
        }

        /**
         * Filter upgrades
         *
         * @since DOKAN_LITE_SINCE
         *
         * @var array
         */
        $upgrades = apply_filters( 'dokan_upgrade_upgrades', [] );

        uksort( $upgrades, function ( $a, $b ) {
            return version_compare( $b, $a, '<' );
        } );

        update_option( $this->is_upgrading_db_key, $upgrades, false );

        return $upgrades;
    }

    /**
     * Run upgrades
     *
     * This will execute every method found in a
     * upgrader class, execute `run` method defined
     * in `DokanUpgrader` abstract class and then finally,
     * `update_db_version` will update the db version
     * reference in database.
     *
     * @since DOKAN_LITE_SINCE
     *
     * @return void
     */
    public function do_upgrade() {
        $upgrades = $this->get_upgrades();

        foreach ( $upgrades as $version => $upgraders ) {
            foreach ( $upgraders as $upgrader ) {
                $required_version = null;

                if ( is_array( $upgrader ) ) {
                    $required_version = $upgrader['require'];
                    $upgrader         = $upgrader['upgrader'];
                }

                call_user_func( [ $upgrader, 'run' ], $required_version );
                call_user_func( [ $upgrader, 'update_db_version' ] );
            }
        }

        delete_option( $this->is_upgrading_db_key );

        /**
         * Fires after finish the upgrading
         *
         * At this point plugin should update the
         * db version key to version constant like DOKAN_PLUGIN_VERSION
         *
         * @since DOKAN_LITE_SINCE
         */
        do_action( 'dokan_upgrade_finished' );
    }
}

