<?php
/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\NewsBundle\Entity;

use Sonata\NewsBundle\Entity\BasePostRepository;

/**
 * This file has been generated by the EasyExtends bundle ( http://sonata-project.org/easy-extends )
 *
 * References :
 *   custom repository : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en#querying:custom-repositories
 *   query builder     : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/query-builder/en
 *   dql               : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/dql-doctrine-query-language/en
 *
 * @author <yourname> <youremail>
 */
class PostRepository extends BasePostRepository
{
	public function findLastSlides($limit)
	{
		$qb = $this->createQueryBuilder('p')
			->where('p.enabled = true')
			->andWhere('p.image_id <> NULL')
			->setMaxResults($limit)
		;

		$query = $qb->getQuery();

		return $query->getResult();
	}
}