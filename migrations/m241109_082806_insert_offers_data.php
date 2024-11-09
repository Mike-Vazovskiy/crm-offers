<?php

use yii\db\Migration;

/**
 * Class m241109_082806_insert_offers_data
 */
class m241109_082806_insert_offers_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%offers}}', ['name', 'email', 'phone', 'created_at'], [
            ['Offer 1', 'offer1@example.com', '123-456-7890', '2024-11-08 10:00:00'],
            ['Offer 2', 'offer2@example.com', '123-456-7891', '2024-11-08 10:05:00'],
            ['Offer 3', 'offer3@example.com', '123-456-7892', '2024-11-08 10:10:00'],
            ['Offer 4', 'offer4@example.com', '123-456-7893', '2024-11-08 10:15:00'],
            ['Offer 5', 'offer5@example.com', '123-456-7894', '2024-11-08 10:20:00'],
            ['Offer 6', 'offer6@example.com', '123-456-7895', '2024-11-08 10:25:00'],
            ['Offer 7', 'offer7@example.com', '123-456-7896', '2024-11-08 10:30:00'],
            ['Offer 8', 'offer8@example.com', '123-456-7897', '2024-11-08 10:35:00'],
            ['Offer 9', 'offer9@example.com', '123-456-7898', '2024-11-08 10:40:00'],
            ['Offer 10', 'offer10@example.com', '123-456-7899', '2024-11-08 10:45:00'],
            ['Offer 11', 'offer11@example.com', '123-456-7800', '2024-11-08 10:50:00'],
            ['Offer 12', 'offer12@example.com', '123-456-7801', '2024-11-08 10:55:00'],
            ['Offer 13', 'offer13@example.com', '123-456-7802', '2024-11-08 11:00:00'],
            ['Offer 14', 'offer14@example.com', '123-456-7803', '2024-11-08 11:05:00'],
            ['Offer 15', 'offer15@example.com', '123-456-7804', '2024-11-08 11:10:00'],
            ['Offer 16', 'offer16@example.com', '123-456-7805', '2024-11-08 11:15:00'],
            ['Offer 17', 'offer17@example.com', '123-456-7806', '2024-11-08 11:20:00'],
            ['Offer 18', 'offer18@example.com', '123-456-7807', '2024-11-08 11:25:00'],
            ['Offer 19', 'offer19@example.com', '123-456-7808', '2024-11-08 11:30:00'],
            ['Offer 20', 'offer20@example.com', '123-456-7809', '2024-11-08 11:35:00'],
            ['Offer 21', 'offer21@example.com', '123-456-7810', '2024-11-08 11:40:00'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach (range(1, 21) as $i) {
            $this->delete('{{%offers}}', ['email' => "offer{$i}@example.com"]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241109_082806_insert_offers_data cannot be reverted.\n";

        return false;
    }
    */
}
