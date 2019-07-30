<?php

use App\GildedRose;
use App\Element;

/*
 * Your work begins on LINE 249.
 */

describe('Gilded Rose', function () {

    describe('#tick', function () {

        context ('normal Items', function () {

            it ('updates normal items before sell date', function () {
                $item = (new Element\Common())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(9);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates normal items on the sell date', function () {
                $item = (new Element\Common())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(8);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates normal items after the sell date', function () {
                $item = (new Element\Common())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(-5);

                $item->tick();

                expect($item->quality)->toBe(8);
                expect($item->sellIn)->toBe(-6);
            });

            it ('updates normal items with a quality of 0', function () {
                $item = (new Element\Common())
                            ->withInitialQuality(0)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(4);
            });

        });


        context('Brie Items', function () {

            it ('updates Brie items before the sell date', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(11);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Brie items before the sell date with maximum quality', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Brie items on the sell date', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items on the sell date, near maximum quality', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(49)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items on the sell date with maximum quality', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items after the sell date', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(-10);

                $item->tick();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-11);
            });

             it ('updates Briem items after the sell date with maximum quality', function () {
                $item = (new Element\Vintage())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(-10);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-11);
            });

        });


        context('Sulfuras Items', function () {

            it ('updates Sulfuras items before the sell date', function () {
                $item = (new Element\Legendary());
                $item->tick();

                expect($item->quality)->toBe(80);
            });

            it ('updates Sulfuras items on the sell date', function () {
                $item = (new Element\Legendary());
                $item->tick();

                expect($item->quality)->toBe(80);
            });

            it ('updates Sulfuras items after the sell date', function () {
                $item = (new Element\Legendary());
                $item->tick();

                expect($item->quality)->toBe(80);
            });

        });


        context('Backstage Passes', function () {
            /*
                "Backstage passes", like aged brie, increases in Quality as it's SellIn
                value approaches; Quality increases by 2 when there are 10 days or
                less and by 3 when there are 5 days or less but Quality drops to
                0 after the concert
             */
            it ('updates Backstage pass items long before the sell date', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(11);

                $item->tick();
 
                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(10);
            });

            it ('updates Backstage pass items close to the sell date', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(10);

                $item->tick();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Backstage pass items close to the sell data, at max quality', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(10);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Backstage pass items very close to the sell date', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(13); // goes up by 3
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Backstage pass items very close to the sell date, at max quality', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(5);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Backstage pass items with one day left to sell', function () {
                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(1);

                $item->tick();

                expect($item->quality)->toBe(13);
                expect($item->sellIn)->toBe(0);
            });

            it ('updates Backstage pass items with one day left to sell, at max quality', function () {

                $item = (new Element\Timelimited())
                            ->withInitialQuality(50)
                            ->withDaysToExpire(1);

                $item->tick();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(0);
            });

            it ('updates Backstage pass items on the sell date', function () {

                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Backstage pass items after the sell date', function () {

                $item = (new Element\Timelimited())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(-1);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-2);
            });

        });


        context ("Conjured Items", function () {

            it ('updates Conjured items before the sell date', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(10);
                $item->tick();

                expect($item->quality)->toBe(8);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Conjured items at zero quality', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(0)
                            ->withDaysToExpire(10);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Conjured items on the sell date', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(6);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Conjured items on the sell date at 0 quality', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(0)
                            ->withDaysToExpire(0);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Conjured items after the sell date', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(10)
                            ->withDaysToExpire(-10);

                $item->tick();

                expect($item->quality)->toBe(6);
                expect($item->sellIn)->toBe(-11);
            });

            it ('updates Conjured items after the sell date at zero quality', function () {
                $item = (new Element\Conjured())
                            ->withInitialQuality(0)
                            ->withDaysToExpire(-10);

                $item->tick();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-11);
            });

        });

    });

});
