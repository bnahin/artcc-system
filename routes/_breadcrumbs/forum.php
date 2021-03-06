<?php

Breadcrumbs::register('forum.index', function($breadcrumbs) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', '#');
});

Breadcrumbs::register('forum.category', function($breadcrumbs, $category) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($category->name, '#');
});

Breadcrumbs::register('forum.board', function($breadcrumbs, $category, $board) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($category->name, route('forum.category', $category));
    $breadcrumbs->push($board->name, '#');
});

Breadcrumbs::register('forum.thread', function($breadcrumbs, $category, $board, $thread) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($category->name, route('forum.category', $category));
    $breadcrumbs->push($board->name, route('forum.board', [$category, $board]));
    $breadcrumbs->push($thread->title, '#');
});

Breadcrumbs::register('forum.board.new', function($breadcrumbs, $category, $board) use ($settings) {
    $breadcrumbs->push($settings->artcc_code.' ARTCC', route('index'));
    $breadcrumbs->push('Forum', route('forum.index'));
    $breadcrumbs->push($category->name, route('forum.category', $category));
    $breadcrumbs->push($board->name, route('forum.board', [$category, $board]));
    $breadcrumbs->push('New Post', '#');
});