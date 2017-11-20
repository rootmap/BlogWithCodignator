<?php

	class Post_model extends CI_model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug=false)
		{
			if($slug===false)
			{
				$this->db->order_by('posts.id','DESC');
				$this->db->join('categories','posts.category_id=categories.id');
				$query=$this->db->get('posts');
				return $query->result_array();
			}


			$query=$this->db->get_where('posts',array('slug'=>$slug));
			return $query->row_array();

		}


		public function create_posts($post_image)
		{
			$slug=url_title($this->input->post('title'));

			$data=array(
				'title'=>$this->input->post('title'),
				'category_id'=>$this->input->post('category_id'),
				'slug'=>$slug,
				'body'=>$this->input->post('body'),
				'post_image'=>$post_image
			);

			return $this->db->insert('posts',$data);

		}

		public function delete_post($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post()
		{
			$slug=url_title($this->input->post('title'));

			$data=array(
				'title'=>$this->input->post('title'),
				'category_id'=>$this->input->post('category_id'),
				'slug'=>$slug,
				'body'=>$this->input->post('body')
			);

			$this->db->where('id',$this->input->post('id'));

			return $this->db->update('posts',$data);

		}

		public function get_categories()
		{
			$this->db->order_by('name','ASC');
			$query=$this->db->get('categories');
			return $query->result_array();

		}


	}