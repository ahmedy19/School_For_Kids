<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Node;

abstract class Node
{
    /**
     * @var int
     */
    protected $depth = 0;

    /**
     * @var Node|null
     */
    protected $parent;

    /**
     * @var Node|null
     */
    protected $previous;

    /**
     * @var Node|null
     */
    protected $next;

    /**
     * @var Node|null
     */
    protected $firstChild;

    /**
     * @var Node|null
     */
    protected $lastChild;

    /**
     * @return Node|null
     */
    public function previous(): ?Node
    {
        return $this->previous;
    }

    /**
     * @return Node|null
     */
    public function next(): ?Node
    {
        return $this->next;
    }

    /**
     * @return Node|null
     */
    public function parent(): ?Node
    {
        return $this->parent;
    }

    /**
     * @param Node|null $node
     */
    protected function setParent(Node $node = null)
    {
        $this->parent = $node;
        $this->depth = ($node === null) ? 0 : $node->depth + 1;
    }

    /**
     * Inserts the $sibling node after $this
     *
     * @param Node $sibling
     */
    public function insertAfter(Node $sibling)
    {
        $sibling->detach();
        $sibling->next = $this->next;

        if ($sibling->next) {
            $sibling->next->previous = $sibling;
        }

        $sibling->previous = $this;
        $this->next = $sibling;
        $sibling->setParent($this->parent);

        if (!$sibling->next && $sibling->parent) {
            $sibling->parent->lastChild = $sibling;
        }
    }

    /**
     * Inserts the $sibling node before $this
     *
     * @param Node $sibling
     */
    public function insertBefore(Node $sibling)
    {
        $sibling->detach();
        $sibling->previous = $this->previous;

        if ($sibling->previous) {
            $sibling->previous->next = $sibling;
        }

        $sibling->next = $this;
        $this->previous = $sibling;
        $sibling->setParent($this->parent);

        if (!$sibling->previous && $sibling->parent) {
            $sibling->parent->firstChild = $sibling;
        }
    }

    public function replaceWith(Node $replacement)
    {
        $replacement->detach();
        $this->insertAfter($replacement);
        $this->detach();
    }

    public function detach()
    {
        if ($this->previous) {
            $this->previous->next = $this->next;
        } elseif ($this->parent) {
            $this->parent->firstChild = $this->next;
        }

        if ($this->next) {
            $this->next->previous = $this->previous;
        } elseif ($this->parent) {
            $this->parent->lastChild = $this->previous;
        }

        $this->parent = null;
        $this->next = null;
        $this->previous = null;
        $this->depth = 0;
    }

    /**
     * @return bool
     */
    abstract public function isContainer(): bool;

    /**
     * @return Node|null
     */
    public function firstChild(): ?Node
    {
        return $this->firstChild;
    }

    /**
     * @return Node|null
     */
    public function lastChild(): ?Node
    {
        return $this->lastChild;
    }

    /**
     * @return Node[]
     */
    public function children(): iterable
    {
        $children = [];
        for ($current = $this->firstChild; null !== $current; $current = $current->next) {
            $children[] = $current;
        }

        return $children;
    }

    /**
     * @param Node $child
     */
    public function appendChild(Node $child)
    {
        if ($this->lastChild) {
            $this->lastChild->insertAfter($child);
        } else {
            $child->detach();
            $child->setParent($this);
            $this->lastChild = $this->firstChild = $child;
        }
    }

    /**
     * Adds $child as the very first child of $this
     *
     * @param Node $child
     */
    public function prependChild(Node $child)
    {
        if ($this->firstChild) {
            $this->firstChild->insertBefore($child);
        } else {
            $child->detach();
            $child->setParent($this);
            $this->lastChild = $this->firstChild = $child;
        }
    }

    /**
     * Detaches all child nodes of given node
     */
    public function detachChildren()
    {
        foreach ($this->children() as $children) {
            $children->setParent(null);
        }
        $this->firstChild = $this->lastChild = null;
    }

    /**
     * Replace all children of given node with collection of another
     *
     * @param iterable $children
     *
     * @return $this
     */
    public function replaceChildren(iterable $children)
    {
        $this->detachChildren();
        foreach ($children as $item) {
            $this->appendChild($item);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @return NodeWalker
     */
    public function walker(): NodeWalker
    {
        return new NodeWalker($this);
    }
}
