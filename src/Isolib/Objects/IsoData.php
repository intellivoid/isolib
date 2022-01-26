<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace Isolib\Objects;

    class IsoData
    {
        /**
         * The full country name
         *
         * @var string
         */
        public $Name;

        /**
         * Alpha-2 Code (Two-Letter)
         *
         * @var string|null
         */
        public $Alpha2;

        /**
         * Alpha-3 Code (Three-letter)
         *
         * @var string|null
         */
        public $Alpha3;

        /**
         * The country code
         *
         * @var int|null
         */
        public $CountryCode;

        /**
         * The Unique ISO-3166-2 Code
         *
         * @var string|null
         */
        public $Iso31662;

        /**
         * The region the country is based in
         *
         * @var string|null
         */
        public $Region;

        /**
         * The subregion the country is based in
         *
         * @var string|null
         */
        public $SubRegion;

        /**
         * The intermediate region the country is based in
         *
         * @var string|null
         */
        public $IntermediateRegion;

        /**
         * The region code
         *
         * @var int|null
         */
        public $RegionCode;

        /**
         * Sub-region code
         *
         * @var int|null
         */
        public $SubRegionCode;

        /**
         * Intermediate region code
         *
         * @var int|null
         */
        public $IntermediateRegionCode;

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'name' => $this->Name,
                'alpha-2' => $this->Alpha2,
                'alpha-3' => $this->Alpha3,
                'country-code' => $this->CountryCode,
                'iso_3166-2' => $this->Iso31662,
                'region' => $this->Region,
                'sub-region' => $this->SubRegion,
                'intermediate-region' => $this->IntermediateRegion,
                'region-code' => $this->RegionCode,
                'sub-region-code' => $this->SubRegionCode,
                'intermediate-region-code' => $this->IntermediateRegionCode
            ];
        }

        public static function fromArray(array $data): IsoData
        {
            $IsoData = new IsoData();

            foreach($data as $key => $value)
            {
                if(strlen($value) == 0)
                    unset($data[$key]);
            }

            if(isset($data['name']))
                $IsoData->Name = $data['name'];

            if(isset($data['alpha-2']))
                $IsoData->Alpha2 = $data['alpha-2'];

            if(isset($data['alpha-3']))
                $IsoData->Alpha3 = $data['alpha-3'];

            if(isset($data['country-code']))
                $IsoData->CountryCode = $data['country-code'];

            if(isset($data['iso_3166-2']))
                $IsoData->Iso31662 = $data['iso_3166-2'];

            if(isset($data['region']))
                $IsoData->Region = $data['region'];

            if(isset($data['sub-region']))
                $IsoData->SubRegion = $data['sub-region'];

            if(isset($data['intermediate-region']))
                $IsoData->IntermediateRegion = $data['intermediate-region'];

            if(isset($data['region-code']))
                $IsoData->RegionCode = $data['region-code'];

            if(isset($data['sub-region-code']))
                $IsoData->SubRegionCode = $data['sub-region-code'];

            if(isset($data['intermediate-region-code']))
                $IsoData->IntermediateRegionCode = $data['intermediate-region-code'];

            return $IsoData;
        }
    }