<?php

use yii\db\Migration;

/**
 * Class m210507_152005_activ_proy_bitacora
 */
class m210507_152005_activ_proy_bitacora extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Proyectos}}', [
            'idProyecto'        => $this->primaryKey(),
            'NombreProyecto'    => $this->string(200)->unique(),
            'Activo'            => $this->boolean()
        ], $tableOptions);

        $this->createTable('{{%Actividades}}',[
            'idActividad'       => $this->primaryKey(),
            'NombreActividad'   => $this->string(200)->unique(),
            'Activo'            => $this->boolean(),
            'idProyecto'        => $this->integer()
        ], $tableOptions);

        $this->createTable('{{%Bitacoratiempos}}', [
            'idBitacoraTiempos'     => $this->primaryKey(),
            'Fecha'                 => $this->date(),
            'HoraInicio'            => $this->time(),
            'HoraFinal'             => $this->time(),
            'Interrupcion'          => $this->time(),
            'Total'                 => $this->float(),
            'ActividadNoPlaneada'   => $this->string(250),
            'idActividadPlaneada'   => $this->integer(),
            'idProyecto'            => $this->integer(),
            'Artefacto'             => $this->string(250),
            'idUsuario'             => $this->integer()
        ], $tableOptions);

        $this->addForeignKey('FK_act_pry', 'Actividades', 'idProyecto', 'Proyectos', 'idProyecto');
        $this->addForeignKey('FK_bitt_pry', 'Bitacoratiempos', 'idProyecto', 'Proyectos', 'idProyecto');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_act_pry', 'Actividades');
        $this->dropForeignKey('FK_bitt_pry', 'Bitacoratiempos');
        $this->dropTable('{{%Proyectos}}');
        $this->dropTable('{{%Actividades}}');
        $this->dropTable('{{%Bitacoratiempos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210507_152005_activ_proy_bitacora cannot be reverted.\n";

        return false;
    }
    */
}
