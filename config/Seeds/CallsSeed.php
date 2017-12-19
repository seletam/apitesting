<?php
use Migrations\AbstractSeed;

/**
 * Calls seed.
 */
class CallsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Support Service',
                'type' => '1',
                'description' => 'Deployment of an operating system',
                'priority' => '0',
                'status' => '0',
                'creation_date' => '2017-09-09 00:00:00',
                'modified_date' => '2017-09-30 00:00:00',
                'group_id' => '7',
            ],
            [
                'id' => '2',
                'name' => 'Call Centre',
                'type' => '0',
                'description' => 'Desktop Support Engineer to to provide technical assistance to our clients. You will help install, upgrade and troubleshoot hardware and software systems.  If you’re computer-savvy and enjoy supporting end users, we’d like to meet you. To succeed in this role, you should have a problem-solving attitude along with the ability to give clear technical instructions. You should also be familiar with remote troubleshooting techniques. Ultimately, you will ensure prompt and accurate customer service and increase client satisfaction.',
                'priority' => '0',
                'status' => '1',
                'creation_date' => '2017-09-09 00:00:00',
                'modified_date' => '2017-09-09 00:00:00',
                'group_id' => '4',
            ],
            [
                'id' => '3',
                'name' => 'System Administrator',
                'type' => '0',
                'description' => 'Access to DMS ',
                'priority' => '1',
                'status' => '1',
                'creation_date' => '2017-09-09 19:12:00',
                'modified_date' => '2022-11-30 00:00:00',
                'group_id' => '2',
            ],
            [
                'id' => '4',
                'name' => 'Support Service',
                'type' => '1',
                'description' => 'We are looking for a skilled Call center manager to supervise daily operations and personnel aiming for maximum efficiency and cost-effectiveness. You will also ensure that technology is utilized to a maximum and that staff are well-organized and productive.  An excellent call center manager must be an organized, reliable and results-driven professional. They must have a practical mind to solve problems on the spot partnered with an ability to see the “big picture” and make improvements. As a call center manager, you must also have excellent customer service and communication skills.  The goal is to do everything possible to attain goals and achieve great results for our company.',
                'priority' => '0',
                'status' => '0',
                'creation_date' => '2017-09-10 00:00:00',
                'modified_date' => '2017-09-10 00:00:00',
                'group_id' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Procurement',
                'type' => '0',
                'description' => 'RFQ for office stationery',
                'priority' => '1',
                'status' => '0',
                'creation_date' => '2017-09-09 00:00:00',
                'modified_date' => '2017-09-09 00:00:00',
                'group_id' => '8',
            ],
        ];

        $table = $this->table('calls');
        $table->insert($data)->save();
    }
}
