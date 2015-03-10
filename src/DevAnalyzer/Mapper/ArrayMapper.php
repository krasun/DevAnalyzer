<?php

namespace DevAnalyzer\Mapper;

class ArrayMapper 
{
    /**
     * Creates instance, calls setters on it and then returns it.
     *
     * Important! It can creates instances for classes with simple constructors
     * without arguments.
     *
     * @param string $className
     * @param array $data
     *
     * @return mixed Instance of specified model
     */
    public function createFromArray($className, $data)
    {
        $object = new $className;

        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($object, $setter)) {
                $object->$setter($value);
            }
        }

        return $object;
    }
} 