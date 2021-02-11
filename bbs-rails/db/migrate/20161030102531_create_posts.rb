class CreatePosts < ActiveRecord::Migration
  def change
    create_table :posts do |t|
      t.text :name
      t.text :content
      t.integer :post_number

      t.timestamps null: false
    end
  end
end
