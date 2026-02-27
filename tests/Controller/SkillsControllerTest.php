<?php

namespace App\Tests\Controller;

use App\Entity\Skills;
use App\Repository\SkillsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SkillsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $skillRepository;
    private string $path = '/skills/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->skillRepository = $this->manager->getRepository(Skills::class);

        foreach ($this->skillRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Skill index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'skill[title]' => 'Testing',
            'skill[name]' => 'Testing',
            'skill[type]' => 'Testing',
            'skill[image]' => 'Testing',
            'skill[description]' => 'Testing',
        ]);

        self::assertResponseRedirects('/skills');

        self::assertSame(1, $this->skillRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Skills();
        $fixture->setTitle('My Title');
        $fixture->setName('My Title');
        $fixture->setType('My Title');
        $fixture->setImage('My Title');
        $fixture->setDescription('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Skill');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Skills();
        $fixture->setTitle('Value');
        $fixture->setName('Value');
        $fixture->setType('Value');
        $fixture->setImage('Value');
        $fixture->setDescription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'skill[title]' => 'Something New',
            'skill[name]' => 'Something New',
            'skill[type]' => 'Something New',
            'skill[image]' => 'Something New',
            'skill[description]' => 'Something New',
        ]);

        self::assertResponseRedirects('/skills');

        $fixture = $this->skillRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getType());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getDescription());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Skills();
        $fixture->setTitle('Value');
        $fixture->setName('Value');
        $fixture->setType('Value');
        $fixture->setImage('Value');
        $fixture->setDescription('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/skills');
        self::assertSame(0, $this->skillRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
