<?php

use Illuminate\Database\Seeder;
use App\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::find(1);
        $user2 = App\User::find(2);
        $user3 = App\User::find(3);
        $user4 = App\User::find(4);

        $product = App\Product::find(1);
        $product2 = App\Product::find(2);
        $product3 = App\Product::find(3);
        $product4 = App\Product::find(4);

        //like section
        $user->likes($product->id);
        $user->likes($product2->id);
        $user->likes($product3->id);
        $user->likes($product4->id);

        $user2->likes($product->id);
        $user2->likes($product2->id);
        $user2->likes($product3->id);
     
        $user3->likes($product->id);
        $user3->likes($product2->id);
        $user3->likes($product4->id);

        $user4->likes($product2->id);
        $user4->likes($product3->id);
        $user4->likes($product4->id);

        //rating section
        $user->rates($product->id, 5);
        $user->rates($product2->id, 4);
        $user->rates($product3->id, 5);
        $user->rates($product4->id, 4);

        $user2->rates($product->id, 4);
        $user2->rates($product2->id, 4);
        $user2->rates($product3->id, 5);
        $user2->rates($product4->id, 4);

        $user3->rates($product->id, 5);
        $user3->rates($product2->id, 5);
        $user3->rates($product3->id, 4);
        $user3->rates($product4->id, 4);

        $user4->rates($product->id, 5);
        $user4->rates($product2->id, 5);
        $user4->rates($product3->id, 4);
        $user4->rates($product4->id, 4);

        //comment Section

        $product->saveComment("this is 1st comment for 1st product from 1st user", $user->id, true);
        $product->saveComment("this is 2nd comment for 1st product from 1st user", $user->id);

        $product->saveComment("this is 1st comment for 1st product from 2nd user", $user2->id, true);
        $product->saveComment("this is 2nd comment for 1st product from 2nd user", $user2->id);

        $product->saveComment("this is 1st comment for 1st product from 3rd user", $user3->id, true);
        $product->saveComment("this is 2nd comment for 1st product from 3rd user", $user3->id);

        $product->saveComment("this is 1st comment for 1st product from 4th user", $user4->id, true);
        $product->saveComment("this is 2nd comment for 1st product from 4th user", $user4->id);


        $product2->saveComment("this is 1st comment for product2 from 1st user", $user->id, true);
        $product2->saveComment("this is 2nd comment for product2 from 1st user", $user->id);

        $product2->saveComment("this is 1st comment for product2 from 2nd user", $user2->id, true);
        $product2->saveComment("this is 2nd comment for product2 from 2nd user", $user2->id);

        $product2->saveComment("this is 1st comment for product2 from 3rd user", $user3->id, true);
        $product2->saveComment("this is 2nd comment for product2 from 3rd user", $user3->id);

        $product2->saveComment("this is 1st comment for product2 from 4th user", $user4->id, true);
        $product2->saveComment("this is 2nd comment for product2 from 4th user", $user4->id);

        $product3->saveComment("this is 1st comment for product3 from 1st user", $user->id, true);
        $product3->saveComment("this is 2nd comment for product3 from 1st user", $user->id);

        $product3->saveComment("this is 1st comment for product3 from 2nd user", $user2->id, true);
        $product3->saveComment("this is 2nd comment for product3 from 2nd user", $user2->id);

        $product3->saveComment("this is 1st comment for product3 from 3rd user", $user3->id, true);
        $product3->saveComment("this is 2nd comment for product3 from 3rd user", $user3->id);

        $product3->saveComment("this is 1st comment for product3 from 4th user", $user4->id, true);
        $product3->saveComment("this is 2nd comment for product3 from 4th user", $user4->id);

        $product4->saveComment("this is 1st comment for product4 from 1st user", $user->id, true);
        $product4->saveComment("this is 2nd comment for product4 from 1st user", $user->id);

        $product4->saveComment("this is 1st comment for product4 from 2nd user", $user2->id, true);
        $product4->saveComment("this is 2nd comment for product4 from 2nd user", $user2->id);

        $product4->saveComment("this is 1st comment for product4 from 3rd user", $user3->id, true);
        $product4->saveComment("this is 2nd comment for product4 from 3rd user", $user3->id);

        $product4->saveComment("this is 1st comment for product4 from 4th user", $user4->id, true);
        $product4->saveComment("this is 2nd comment for product4 from 4th user", $user4->id);


        //replySection
        $product->saveReply("this is 1st Reply for 1st product from 1st user", $user->id, 1);
        $product->saveReply("this is 2nd Reply for 1st product from 2nd user", $user2->id, 1);
        $product->saveReply("this is 3rd Reply for 1st product from third user", $user3->id, 1);
        $product->saveReply("this is 4th Reply for 1st product from fourth user", $user4->id, 1);

        $product2->saveReply("this is 1st Reply for product2 from 1st user", $user->id, 9);
        $product2->saveReply("this is 2nd Reply for product2 from 2nd user", $user2->id, 9);
        $product2->saveReply("this is 3rd Reply for product2 from third user", $user3->id, 9);
        $product2->saveReply("this is 4th Reply for product2 from fourth user", $user4->id, 9);



        $product3->saveReply("this is 1st Reply for product3 from 1st user", $user->id, 17);
        $product3->saveReply("this is 2nd Reply for product3 from 2nd user", $user2->id, 17);
        $product3->saveReply("this is 3rd Reply for product3 from third user", $user3->id, 17);
        $product3->saveReply("this is 4th Reply for product3 from fourth user", $user4->id, 17);


        $product4->saveReply("this is 1st Reply for product4 from 1st user", $user->id, 25);
        $product4->saveReply("this is 2nd Reply for product4 from 2nd user", $user2->id, 25);
        $product4->saveReply("this is 3rd Reply for product4 from third user", $user3->id, 25);
        $product4->saveReply("this is 4th Reply for product4 from fourth user", $user4->id, 25);
    }
}
