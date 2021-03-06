<?php

namespace Base;

use \SuitsQuery as ChildSuitsQuery;
use \Exception;
use \PDO;
use Map\SuitsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'suits' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Suits implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SuitsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the suitnumber field.
     * @var        string
     */
    protected $suitnumber;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the datefiled field.
     * @var        int
     */
    protected $datefiled;

    /**
     * The value for the suitstatus field.
     * @var        string
     */
    protected $suitstatus;

    /**
     * The value for the suitaccess field.
     * @var        string
     */
    protected $suitaccess;

    /**
     * The value for the suitdateid field.
     * @var        int
     */
    protected $suitdateid;

    /**
     * The value for the suitcourt field.
     * @var        string
     */
    protected $suitcourt;

    /**
     * The value for the userid field.
     * @var        int
     */
    protected $userid;

    /**
     * The value for the dataentryname field.
     * @var        int
     */
    protected $dataentryname;

    /**
     * The value for the created field.
     * @var        int
     */
    protected $created;

    /**
     * The value for the modified field.
     * @var        int
     */
    protected $modified;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Suits object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Suits</code> instance.  If
     * <code>obj</code> is an instance of <code>Suits</code>, delegates to
     * <code>equals(Suits)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Suits The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [suitnumber] column value.
     *
     * @return string
     */
    public function getSuitnumber()
    {
        return $this->suitnumber;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [datefiled] column value.
     *
     * @return int
     */
    public function getDatefiled()
    {
        return $this->datefiled;
    }

    /**
     * Get the [suitstatus] column value.
     *
     * @return string
     */
    public function getSuitstatus()
    {
        return $this->suitstatus;
    }

    /**
     * Get the [suitaccess] column value.
     *
     * @return string
     */
    public function getSuitaccess()
    {
        return $this->suitaccess;
    }

    /**
     * Get the [suitdateid] column value.
     *
     * @return int
     */
    public function getSuitdateid()
    {
        return $this->suitdateid;
    }

    /**
     * Get the [suitcourt] column value.
     *
     * @return string
     */
    public function getSuitcourt()
    {
        return $this->suitcourt;
    }

    /**
     * Get the [userid] column value.
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Get the [dataentryname] column value.
     *
     * @return int
     */
    public function getDataentryname()
    {
        return $this->dataentryname;
    }

    /**
     * Get the [created] column value.
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get the [modified] column value.
     *
     * @return int
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[SuitsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [suitnumber] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitnumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitnumber !== $v) {
            $this->suitnumber = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITNUMBER] = true;
        }

        return $this;
    } // setSuitnumber()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[SuitsTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[SuitsTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [datefiled] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDatefiled($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->datefiled !== $v) {
            $this->datefiled = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DATEFILED] = true;
        }

        return $this;
    } // setDatefiled()

    /**
     * Set the value of [suitstatus] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitstatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitstatus !== $v) {
            $this->suitstatus = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITSTATUS] = true;
        }

        return $this;
    } // setSuitstatus()

    /**
     * Set the value of [suitaccess] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitaccess($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitaccess !== $v) {
            $this->suitaccess = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITACCESS] = true;
        }

        return $this;
    } // setSuitaccess()

    /**
     * Set the value of [suitdateid] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitdateid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->suitdateid !== $v) {
            $this->suitdateid = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITDATEID] = true;
        }

        return $this;
    } // setSuitdateid()

    /**
     * Set the value of [suitcourt] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitcourt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitcourt !== $v) {
            $this->suitcourt = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITCOURT] = true;
        }

        return $this;
    } // setSuitcourt()

    /**
     * Set the value of [userid] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setUserid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->userid !== $v) {
            $this->userid = $v;
            $this->modifiedColumns[SuitsTableMap::COL_USERID] = true;
        }

        return $this;
    } // setUserid()

    /**
     * Set the value of [dataentryname] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDataentryname($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dataentryname !== $v) {
            $this->dataentryname = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DATAENTRYNAME] = true;
        }

        return $this;
    } // setDataentryname()

    /**
     * Set the value of [created] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created !== $v) {
            $this->created = $v;
            $this->modifiedColumns[SuitsTableMap::COL_CREATED] = true;
        }

        return $this;
    } // setCreated()

    /**
     * Set the value of [modified] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->modified !== $v) {
            $this->modified = $v;
            $this->modifiedColumns[SuitsTableMap::COL_MODIFIED] = true;
        }

        return $this;
    } // setModified()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SuitsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SuitsTableMap::translateFieldName('Suitnumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitnumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SuitsTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SuitsTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SuitsTableMap::translateFieldName('Datefiled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->datefiled = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SuitsTableMap::translateFieldName('Suitstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitstatus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SuitsTableMap::translateFieldName('Suitaccess', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitaccess = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SuitsTableMap::translateFieldName('Suitdateid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitdateid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SuitsTableMap::translateFieldName('Suitcourt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitcourt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SuitsTableMap::translateFieldName('Userid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->userid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SuitsTableMap::translateFieldName('Dataentryname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dataentryname = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SuitsTableMap::translateFieldName('Created', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SuitsTableMap::translateFieldName('Modified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->modified = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = SuitsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Suits'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSuitsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Suits::setDeleted()
     * @see Suits::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSuitsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SuitsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SuitsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SuitsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SuitsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'suitnumber';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEFILED)) {
            $modifiedColumns[':p' . $index++]  = 'datefiled';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'suitstatus';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITACCESS)) {
            $modifiedColumns[':p' . $index++]  = 'suitaccess';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITDATEID)) {
            $modifiedColumns[':p' . $index++]  = 'suitdateid';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITCOURT)) {
            $modifiedColumns[':p' . $index++]  = 'suitcourt';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_USERID)) {
            $modifiedColumns[':p' . $index++]  = 'userid';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATAENTRYNAME)) {
            $modifiedColumns[':p' . $index++]  = 'dataentryname';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'created';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'modified';
        }

        $sql = sprintf(
            'INSERT INTO suits (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'suitnumber':
                        $stmt->bindValue($identifier, $this->suitnumber, PDO::PARAM_STR);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'datefiled':
                        $stmt->bindValue($identifier, $this->datefiled, PDO::PARAM_INT);
                        break;
                    case 'suitstatus':
                        $stmt->bindValue($identifier, $this->suitstatus, PDO::PARAM_STR);
                        break;
                    case 'suitaccess':
                        $stmt->bindValue($identifier, $this->suitaccess, PDO::PARAM_STR);
                        break;
                    case 'suitdateid':
                        $stmt->bindValue($identifier, $this->suitdateid, PDO::PARAM_INT);
                        break;
                    case 'suitcourt':
                        $stmt->bindValue($identifier, $this->suitcourt, PDO::PARAM_STR);
                        break;
                    case 'userid':
                        $stmt->bindValue($identifier, $this->userid, PDO::PARAM_INT);
                        break;
                    case 'dataentryname':
                        $stmt->bindValue($identifier, $this->dataentryname, PDO::PARAM_INT);
                        break;
                    case 'created':
                        $stmt->bindValue($identifier, $this->created, PDO::PARAM_INT);
                        break;
                    case 'modified':
                        $stmt->bindValue($identifier, $this->modified, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SuitsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getSuitnumber();
                break;
            case 2:
                return $this->getTitle();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getDatefiled();
                break;
            case 5:
                return $this->getSuitstatus();
                break;
            case 6:
                return $this->getSuitaccess();
                break;
            case 7:
                return $this->getSuitdateid();
                break;
            case 8:
                return $this->getSuitcourt();
                break;
            case 9:
                return $this->getUserid();
                break;
            case 10:
                return $this->getDataentryname();
                break;
            case 11:
                return $this->getCreated();
                break;
            case 12:
                return $this->getModified();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Suits'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Suits'][$this->hashCode()] = true;
        $keys = SuitsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSuitnumber(),
            $keys[2] => $this->getTitle(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getDatefiled(),
            $keys[5] => $this->getSuitstatus(),
            $keys[6] => $this->getSuitaccess(),
            $keys[7] => $this->getSuitdateid(),
            $keys[8] => $this->getSuitcourt(),
            $keys[9] => $this->getUserid(),
            $keys[10] => $this->getDataentryname(),
            $keys[11] => $this->getCreated(),
            $keys[12] => $this->getModified(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Suits
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SuitsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Suits
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setSuitnumber($value);
                break;
            case 2:
                $this->setTitle($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setDatefiled($value);
                break;
            case 5:
                $this->setSuitstatus($value);
                break;
            case 6:
                $this->setSuitaccess($value);
                break;
            case 7:
                $this->setSuitdateid($value);
                break;
            case 8:
                $this->setSuitcourt($value);
                break;
            case 9:
                $this->setUserid($value);
                break;
            case 10:
                $this->setDataentryname($value);
                break;
            case 11:
                $this->setCreated($value);
                break;
            case 12:
                $this->setModified($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SuitsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSuitnumber($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTitle($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setType($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDatefiled($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSuitstatus($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSuitaccess($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSuitdateid($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSuitcourt($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUserid($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDataentryname($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCreated($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setModified($arr[$keys[12]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Suits The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SuitsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SuitsTableMap::COL_ID)) {
            $criteria->add(SuitsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITNUMBER)) {
            $criteria->add(SuitsTableMap::COL_SUITNUMBER, $this->suitnumber);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TITLE)) {
            $criteria->add(SuitsTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TYPE)) {
            $criteria->add(SuitsTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEFILED)) {
            $criteria->add(SuitsTableMap::COL_DATEFILED, $this->datefiled);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITSTATUS)) {
            $criteria->add(SuitsTableMap::COL_SUITSTATUS, $this->suitstatus);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITACCESS)) {
            $criteria->add(SuitsTableMap::COL_SUITACCESS, $this->suitaccess);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITDATEID)) {
            $criteria->add(SuitsTableMap::COL_SUITDATEID, $this->suitdateid);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITCOURT)) {
            $criteria->add(SuitsTableMap::COL_SUITCOURT, $this->suitcourt);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_USERID)) {
            $criteria->add(SuitsTableMap::COL_USERID, $this->userid);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATAENTRYNAME)) {
            $criteria->add(SuitsTableMap::COL_DATAENTRYNAME, $this->dataentryname);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_CREATED)) {
            $criteria->add(SuitsTableMap::COL_CREATED, $this->created);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_MODIFIED)) {
            $criteria->add(SuitsTableMap::COL_MODIFIED, $this->modified);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSuitsQuery::create();
        $criteria->add(SuitsTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Suits (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSuitnumber($this->getSuitnumber());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setType($this->getType());
        $copyObj->setDatefiled($this->getDatefiled());
        $copyObj->setSuitstatus($this->getSuitstatus());
        $copyObj->setSuitaccess($this->getSuitaccess());
        $copyObj->setSuitdateid($this->getSuitdateid());
        $copyObj->setSuitcourt($this->getSuitcourt());
        $copyObj->setUserid($this->getUserid());
        $copyObj->setDataentryname($this->getDataentryname());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setModified($this->getModified());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Suits Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->suitnumber = null;
        $this->title = null;
        $this->type = null;
        $this->datefiled = null;
        $this->suitstatus = null;
        $this->suitaccess = null;
        $this->suitdateid = null;
        $this->suitcourt = null;
        $this->userid = null;
        $this->dataentryname = null;
        $this->created = null;
        $this->modified = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SuitsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
