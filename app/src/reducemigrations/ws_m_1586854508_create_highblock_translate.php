<?php

use WS\ReduceMigrations\Builder\HighLoadBlockBuilder;
use WS\ReduceMigrations\Builder\Entity\HighLoadBlock;
use WS\ReduceMigrations\Builder\Entity\UserField;
/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1586854508_create_highblock_translate extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "create_highblock_translate";
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
        return "9212ad7365a7095515e2c06a65f4c03c11671fde";
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
        $builder = new HighLoadBlockBuilder();
        $block = $builder->addHLBlock('Translates', 'translates', function (HighLoadBlock $block) {
            $block
                ->addField('uf_code')
                ->sort(10)
                ->label(['ru' => 'Код языка'])
                ->type(UserField::TYPE_STRING);

            $block
                ->addField('uf_translate')
                ->sort(10)
                ->label(['ru' => 'Перевод'])
                ->type(UserField::TYPE_STRING);

            $block
                ->addField('uf_service_code')
                ->label(['ru' => 'Код услуги'])
                ->type(UserField::TYPE_STRING);
        });

    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {

    }
}