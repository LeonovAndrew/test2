<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1586853663_create_iblick_pricelist extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "create_iblick_pricelist";
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
        return "1dbd83f3d587060de27a0843eae769a96c6b92bb";
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
        $ibBuilder->createIblockType('content', function (\WS\ReduceMigrations\Builder\Entity\IblockType $type) {
            $type
                ->inRss(false)
                ->sort(100)
                ->sections('Y')
                ->lang(
                    [
                        'ru' => [
                            'NAME' => 'Контент',
                            'SECTION_NAME' => 'Разделы',
                            'ELEMENT_NAME' => 'Элементы',
                        ],
                    ]
                );
        });
        $ibBuilder->createIblock('content', 'Прайслист', function (\WS\ReduceMigrations\Builder\Entity\Iblock $iblock) {
            $iblock
                ->siteId('s1')
                ->sort(100)
                ->code('pricelist')
                ->groupId(array(
                    '2' => 'R'
                ));
            $iblock
                ->addProperty('Код услуги')
                ->code('CODE')
                ->typeString();
            $iblock
                ->addProperty('Цена')
                ->code('PRICE')
                ->typeString();
        });
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {
        $ibBuilder = new \WS\ReduceMigrations\Builder\IblockBuilder();
        $ibBuilder->removeIblock('content', 'Прайслист');
        $ibBuilder->removeIblockType('content');
    }
}