<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1592572881_create_tag_ib extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "create_tag_ib";
    }

    /**
     * Priority of scenario
     **/
    static public function priority() {
        return self::PRIORITY_MEDIUM;
    }

    /**
     * @return string hash
     */
    static public function hash() {
        return "da61e885ef8b6cb3ee97134bcc4c7192dafbbb42";
    }

    /**
     * @return int approximately time in seconds
     */
    static public function approximatelyTime() {
        return 0;
    }

    /**
     * Write action by apply scenario. Use method `setData` for save need rollback data
     **/
    public function commit() {
        $ibBuilder = new \WS\ReduceMigrations\Builder\IblockBuilder();
        $ibBuilder->createIblock('content', 'Теги', function (\WS\ReduceMigrations\Builder\Entity\Iblock $iblock) {
            $iblock
                ->siteId('s1')
                ->sort(100)
                ->code('tags')
                ->groupId(array(
                    '2' => 'R'
                ));
            $iblock
                ->addProperty('Код раздела услуг')
                ->code('CODE')
                ->multiple()
                ->typeString();
        });
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {
        // my code
    }
}