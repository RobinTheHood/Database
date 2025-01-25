<?php

namespace RobinTheHood\Database;

class DatabaseType
{
    public const T_PRIMARY      = 'int(11) not null auto_increment';
    public const T_STRING       = 'varchar(255)';
    public const T_TEXT         = 'text';
    public const T_INT          = 'int';
    public const T_FLOAT        = 'float';
    public const T_DECIMAL      = 'decimal';
    public const T_DATE         = 'date';
    public const T_DATE_TIME    = 'datetime';
    public const T_TIME         = 'time';
    public const T_BINARY       = 'blob';
    public const T_BOOLEAN      = 'tinyint(1)';
}
