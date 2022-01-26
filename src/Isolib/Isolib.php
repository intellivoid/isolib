<?php

    namespace Isolib;

    use Isolib\Objects\IsoData;

    class Isolib
    {
        /**
         * ISO Data
         *
         * @var IsoData[]
         */
        private $IsoData;

        /**
         * @var array
         */
        private $Indexer;

        public function __construct()
        {
            $data_file = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data.json'), true);

            foreach($data_file as $datum)
            {
                $IsoData = IsoData::fromArray($datum);
                $this->IsoData[strtoupper($IsoData->Iso31662)] = $IsoData;

                $this->Indexer['country'][strtoupper($IsoData->Name)] = strtoupper($IsoData->Iso31662);
                $this->Indexer['alpha2'][strtoupper($IsoData->Alpha2)] = strtoupper($IsoData->Iso31662);
                $this->Indexer['alpha3'][strtoupper($IsoData->Alpha3)] = strtoupper($IsoData->Iso31662);
                $this->Indexer['country_code'][(string)$IsoData->CountryCode] = strtoupper($IsoData->Iso31662);
            }
        }

        /**
         * Resolves the given input into ISO Data
         *
         * @param string $input
         * @return IsoData|null
         */
        public function resolve(string $input): ?IsoData
        {
            $input = strtoupper($input);

            if(isset($this->IsoData[$input]))
                return $this->IsoData[$input];

            if(isset($this->Indexer['alpha2'][$input]))
                return $this->IsoData[$this->Indexer['alpha2'][$input]];

            if(isset($this->Indexer['alpha3'][$input]))
                return $this->IsoData[$this->Indexer['alpha3'][$input]];

            if(isset($this->Indexer['country_code'][$input]))
                return $this->IsoData[$this->Indexer['country_code'][$input]];

            return null;
        }

        /**
         * @return IsoData[]
         */
        public function getIsoData(): array
        {
            return $this->IsoData;
        }
    }